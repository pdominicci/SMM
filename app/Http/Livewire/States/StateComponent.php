<?php

namespace App\Http\Livewire\States;

use App\Models\Country;
use App\Models\State;
use Livewire\WithPagination;
use Livewire\Component;

class StateComponent extends Component
{
    use WithPagination;
    public $view = '';
    public $state_id, $state;
    public $country_id, $countries;
    public $data;
    public $search = '';
    public $perPage = '10';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public function render()
    {
        $states = State::with('relCountry')->orderBy('state', 'asc')->where('state', 'like', "%{$this->search}%")->paginate($this->perPage);
        $data = ['states' => $states];
        return view('livewire.states.state-component',$data);
    }
    public function default(){
        $this->view='';
        $this->state = '';

        return view('livewire.states.state');
    }
    public function new()
    {
        $this->validate(["state" => '']);
        $this->state = '';
        $this->view='create';
        $this->countries = Country::all();
    }
    public function store()
    {
        $this->validar();
        $c = new State;
        $c->country_id = $this->country_id;
        $c->state = $this->state;
        $c->save();
        $this->view = '';
        # using placeholders - vble state
        session()->flash('success', __("The State ':state' was created.", ['state' => $c->state]));
    }
    public function edit($id)
    {
        // esto lo tuve que poner para que no me ponga dos veces el error cada vez que entraba a edit o new
        $this->validate(["state" => '']);
        $c = State::find($id);
        $this->countries = Country::all();
        $this->country_id = $c->country_id;
        $this->state_id = $id;
        $this->state = $c->state;
        $this->view = 'edit';
    }
    public function update()
    {
        $c = State::find($this->state_id);

        // si el pais que ingreso es distinto del que trae valido si no vuelve sin hacer nada
        if ($c->state != $this->state or $c->country_id != $this->country_id){
            $c->country_id = $this->country_id;
            $c->state = $this->state;
            $this->validar();
            $c->save();
            $this->view='';
            session()->flash('success', __("The State ':state' was updated.", ['state' => $c->state]));
        }else{
            $this->view='';
        }
    }
    public function destroy($id)
    {
        $c = State::find($id);
        $state = $c->state;
        State::destroy($id);
        session()->flash('success', __("The State ':state' was deleted.", ['state' => $state]));
    }
    public function validar(){
        $this->validate(
            [
                'country_id' => 'required',
                // validar unique con clave compuesta 'no puede haber dos provincias iguales en el mismo pais'
                'state' => 'required|min:3|max:60|unique:App\Models\State,state,' . $this->id . ',id,country_id,' . $this->country_id
            ],
            [
                'country_id.required' => 'El País es obligatorio',
                'state.required' => 'La Provincia es obligatoria',
                'state.min'=> 'La provincia debe tener al menos tres caracteres',
                'state.max'=> 'La provincia debe tener como máximo 60 caracteres',
                'state.unique'=> 'La provincia ingresada ya existe para el país seleccionado'
            ]
        );
    }
}
