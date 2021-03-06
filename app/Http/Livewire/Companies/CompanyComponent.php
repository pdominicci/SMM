<?php

namespace App\Http\Livewire\Companies;

use Livewire\Component;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Company;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class CompanyComponent extends Component
{
    use WithPagination;
    public $view = '';
    public $city_id, $cities, $city, $city_name;
    public $country_id, $country, $countries, $country_name;
    public $state_id, $states, $state, $state_name;
    public $company, $web;
    public $address, $addressaux;
    public $email, $confirmemail, $whatsapp, $instagram, $facebook, $twitter, $latitude, $longitude;
    public $data;
    public $search = '';
    public $perPage = '10';
    public $zoom;
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];
    public function mount($city = null)
    {
        $this->company = '';
        $this->country = 0;
        $this->countries = Country::all();
        $this->states = collect();
        $this->cities = collect();
        $this->city = $city;

        if (!is_null($city)) {
            $c = City::find($city);
            if ($c) {
                $this->cities = City::where('state_id', $c->state_id)->get();
                $this->states = State::where('country_id', $c->country_id)->get();
                $this->country = $c->country_id;
                $this->state = $c->state_id;
            }
        }
        $this->dispatchBrowserEvent('geocodeAddress', ['zoom' => 3]);
    }
    public function render()
    {
        $companies = Company::orderBy('company', 'asc')->with('relCity')->where('company', 'like', "%{$this->search}%")->paginate($this->perPage);
        $data = ['companies' => $companies];
        return view('livewire.companies.company-component',$data);
    }
    public function default(){
        $this->view='';
        $this->company = '';

        return view('livewire.companies.company');
    }
    public function new()
    {
        $this->validate(["city" => '']);
        $this->address = 'Argentina';
        $this->addressaux = '';
        $this->city = '';
        $this->state = '';
        $this->country = '';
        $this->view='create';

        $this->countries = Country::orderBy('country','asc')->get();
        $this->states = State::orderBy('state','asc')->get();
        $this->dispatchBrowserEvent('geocodeAddress', ['zoom' => 3]);
    }
    public function store()
    {
        $this->country_id = $this->country;
        //$this->validar();
        $c = new Company;
        $c->company = $this->company;
        $c->slug = Str::slug(trim($this->company),'');
        $c->phone = '222';
        $c->city_id = $this->city;
        $c->website = $this->web;
        $c->address = $this->addressaux;
        if ($this->email == $this->confirmemail){
            $c->email = $this->email;
        } else {
            // error email y confirmemail no coinciden
        }
        $c->whatsapp = $this->whatsapp;
        $c->instagram = $this->instagram;
        $c->facebook = $this->facebook;
        $c->twitter = $this->twitter;
        $c->latitude = '';
        $c->longitude = '';

        $c->save();
        $this->view = '';
        session()->flash('success', __("The City ':city' was created.", ['city' => $c->city]));
    }
    public function updatedCompany($company)
    {
        $this->web = "shopmaster.";
        $this->web .= Str::slug(trim($company),'');
        $this->dispatchBrowserEvent('geocodeAddress', ['zoom' => $this->zoom]);
    }
    public function updatedCountry($country)
    {
        $this->address = '';
        $this->addressaux = '';
        $c = Country::where('id',$country)->first();

        $this->country_name = $c->country;
        $this->address = $this->country_name;

        $this->states = State::where('country_id', $country)->with('relCountry')->orderBy('state','asc')->get();

        if (is_null($this->states)){
            $this->state = "";
            $this->city = "";
        }
        $this->zoom = 3;
        $this->dispatchBrowserEvent('geocodeAddress', ['zoom' => $this->zoom]);
    }
    public function updatedState($state)
    {
        $this->address = '';
        $this->addressaux = '';
        $this->cities = City::where('state_id', $state)->with('relState')->orderBy('city','asc')->get();
        if (is_null($this->cities)){
            $this->state = "";
            $this->city = "";
        } else {
            foreach ($this->cities as $c){
                $this->state_name = $c->relState->state;
                $this->address = $this->country_name . ' ' . $this->state_name;
                break;
            }
            $this->zoom = 6;
            $this->dispatchBrowserEvent('geocodeAddress', ['zoom' => $this->zoom]);
        }
    }
    public function updatedCity($city)
    {
        $this->address = '';
        $this->addressaux = '';
        $c = City::where('id', $city)->first();
        $this->city_name = $c->city;
        $this->address = $this->country_name . ' ' . $this->state_name . ' ' . $this->city_name;
        $this->zoom = 10;
        $this->dispatchBrowserEvent('geocodeAddress', ['zoom' => $this->zoom]);
    }
    public function updatedAddressaux($addressaux)
    {
        $this->address = $this->country_name . ' ' . $this->state_name . ' ' . $this->city_name .' '. $addressaux;
        $this->zoom = 16;
        $this->dispatchBrowserEvent('geocodeAddress', ['zoom' => $this->zoom]);
    }
}
