<?php

namespace App\Http\Livewire\Countries;

use App\Models\Country;
use App\Models\State;
use Livewire\WithPagination;
use Livewire\Component;
class CountryComponent extends Component
{
    use WithPagination;
    public $view = '';
    public $country_id, $country;
    public $search = '';
    public $perPage = '10';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public function render()
    {
        //$products = Product::with('relCategory')->where('name', 'like', "%{$this->search}%")->orderBy('id','desc')->paginate($this->perPage);
        $countries = Country::orderBy('country', 'asc')->where('country', 'like', "%{$this->search}%")->paginate($this->perPage);
        $data = ['countries' => $countries];
        return view('livewire.countries.country-component',$data);
    }
    public function default(){
        $this->view='';
        $this->country = '';

        return view('livewire.countries.country');
    }
    public function new()
    {
        $this->validate(["country" => '']);
        $this->country = '';
        $this->view='create';
    }
    public function store()
    {
        $this->validar();
        $c = new Country;
        $c->country = $this->country;
        $c->save();
        $this->view = '';
        # using placeholders - vble country
        session()->flash('success', __("The Country ':country' was created.", ['country' => $c->country]));
    }
    public function edit($id)
    {
        // esto lo tuve que poner para que no me ponga dos veces el error cada vez que entraba a edit o new
        $this->validate(["country" => '']);
        $c = Country::find($id);
        $this->country_id = $id;
        $this->country = $c->country;
        $this->view = 'edit';
    }
    public function update()
    {

        $c = Country::find($this->country_id);

        // si el pais que ingreso es distinto del que trae valido si no vuelve sin hacer nada
        if ($c->country != $this->country){
            $c->country = $this->country;
            $this->validar();
            $c->save();
            $this->view='';
            session()->flash('success', __("The Country ':country' was updated.", ['country' => $c->country]));
        }else{
            $this->view='';
        }
    }
    public function destroy($id)
    {
        $c = Country::find($id);
        $this->country_id = $id;
        $country = $c->country;
        $existeEnState = State::where('country_id',$id)->first();
        if ($existeEnState){
            session()->flash('danger', __("The Country ':country' cannot be deleted is related to at least one State.", ['country' => $country]));
        }else {
            Country::destroy($id);
            session()->flash('success', __("The Country ':country' was deleted.", ['country' => $country]));
        }
    }
    public function validar(){
        $this->validate(
            [
                'country' => 'required|min:3|max:60|unique:App\Models\Country'
            ],
            [
                'country.required' => 'El país es obligatorio',
                'country.min'=> 'El país debe tener al menos dos caracteres',
                'country.max'=> 'El país debe tener como máximo 60 caracteres',
                'country.unique'=> 'El país ingresado ya existe',
            ]
        );
    }
}
