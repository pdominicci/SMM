<?php

namespace App\Http\Livewire\Cities;

use Livewire\Component;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Company;
use Livewire\WithPagination;
class CityComponent extends Component
{
    use WithPagination;
    public $view = '';
    public $city_id, $city;
    public $country_id, $country, $countries;
    public $state_id, $states;
    public $data;
    public $search = '';
    public $perPage = '10';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public function mount()
    {
        $this->countries = Country::all();
        $this->states = collect();
    }

    public function render()
    {
        $cities = City::with('relCountry')->with('relState')->orderBy('city', 'asc')->where('city', 'like', "%{$this->search}%")->paginate($this->perPage);
        $data = ['cities' => $cities];
        return view('livewire.cities.city-component',$data);
    }
    // todas las veces que cambia Country en el form automaticamente entra en este evento
    public function updatedCountry($country)
    {
        $this->states = State::where('country_id', $country)->orderBy('state','asc')->get();
    }
    public function default(){
        $this->view='';
        $this->city = '';

        return view('livewire.cities.city');
    }
    public function new()
    {
        $this->validate(["city" => '']);
        $this->city = '';
        $this->view='create';

        $this->countries = Country::orderBy('country','asc')->get();
        //$this->states = State::orderBy('state','asc')->get();
    }
    public function store()
    {
        $this->country_id = $this->country;
        $this->validar();
        $c = new City;
        $c->country_id = $this->country_id;
        $c->state_id = $this->state_id;
        $c->city = $this->city;
        $c->save();
        $this->view = '';
        # using placeholders - vble city
        session()->flash('success', __("The City ':city' was created.", ['city' => $c->city]));
    }
    public function edit($id)
    {
        $this->validate(["city" => '']);
        $c = City::find($id);
        $this->countries = Country::orderBy('country','asc')->get();
        $this->country_id = $c->country_id;
        $this->city_id = $id;
        $this->city = $c->city;
        $this->view = 'edit';
    }
    public function update()
    {
        $this->country_id = $this->country;
        $c = City::find($this->city_id);

        if ($c->city != $this->city or $c->country_id != $this->country_id or $c->state_id != $this->state_id){
            $c->country_id = $this->country_id;
            $c->state_id = $this->state_id;
            $c->city = $this->city;
            $this->validar();
            $c->save();
            $this->view='';
            session()->flash('success', __("The City ':city' was updated.", ['city' => $c->city]));
        }else{
            $this->view='';
        }
    }
    public function destroy($id)
    {
        $c = City::find($id);
        $city = $c->city;
        $existeEnUserCompany = Company::where('city_id',$id)->first();
        if ($existeEnUserCompany){
            session()->flash('danger', __("The City ':city' cannot be deleted is related to at least one Company.", ['city' => $city]));
        }else {
            City::destroy($id);
            session()->flash('success', __("The City ':city' was deleted.", ['city' => $city]));
        }
    }
    public function validar(){
        $this->validate(
            [
                'country_id' => 'required',
                'state_id' => 'required',
                // validar unique con clave compuesta 'no puede haber dos ciudades iguales en el mismo pais y provincia'
                'city' => 'required|min:3|max:60|unique:App\Models\City,city,id,' . $this->id . ',state_id,' . $this->state_id . ',country_id,' . $this->country_id
            ],
            [
                'country_id.required' => 'El País es obligatorio',
                'state_id.required' => 'La Provincia es obligatoria',
                'city.required' => 'La Ciudad es obligatoria',
                'city.min'=> 'La Ciudad debe tener al menos tres caracteres',
                'city.max'=> 'La Ciudad debe tener como máximo 60 caracteres',
                'city.unique'=> 'La Ciudad ingresada ya existe para el país y provincia seleccionados'
            ]
        );
    }
}
