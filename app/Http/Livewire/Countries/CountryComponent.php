<?php

namespace App\Http\Livewire\Countries;

use App\Models\Country;
use Livewire\Component;

class CountryComponent extends Component
{
    public $view = '';
    public $country_id, $country;

    public function render()
    {
        $countries = Country::orderBy('country', 'asc')->get();
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
        $country = $this->country;
        Country::destroy($id);
        session()->flash('success', __("The Country ':country' was deleted.", ['country' => $country]));
    }
    public function validar(){
        $this->validate(
            [
                'country' => 'required|unique:App\Models\Country',
            ]
        );
    }
}
