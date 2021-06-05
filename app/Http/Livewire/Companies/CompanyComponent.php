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
    public $city_id, $cities, $city;
    public $country_id, $country, $countries;
    public $state_id, $states, $state;
    public $company, $web;
    public $data;
    public $search = '';
    public $perPage = '10';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];
    public function mount($city = null)
    {
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
        $this->city = '';
        $this->state = '';
        $this->view='create';

        $this->countries = Country::orderBy('country','asc')->get();
        $this->states = State::orderBy('state','asc')->get();
    }
    public function updatedCompany($company)
    {
        $this->web = "shopmaster.";
        $this->web .= Str::slug(trim($company),'');
    }
    public function updatedCountry($country)
    {
        $this->states = State::where('country_id', $country)->orderBy('state','asc')->get();
        if (is_null($this->states)){
            $this->state = "";
            $this->city = "";
        }
    }
    public function updatedState($state)
    {
        $this->cities = City::where('state_id', $state)->orderBy('city','asc')->get();
        if (is_null($this->cities)){
            $this->state = "";
            $this->city = "";
        }
    }
}
