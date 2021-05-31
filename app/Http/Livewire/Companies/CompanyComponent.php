<?php

namespace App\Http\Livewire\Companies;

use Livewire\Component;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Company;
use Livewire\WithPagination;

class CompanyComponent extends Component
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
}
