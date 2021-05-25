<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use App\Models\UserCompanies;
use Illuminate\Http\Request;

class UserCompaniesComponent extends Component
{
    public function render()
    {
        $user = auth()->user();
        $usercompanies = UserCompanies::where('user_id', $user->id)->with('companies')->get();
        $user = User::find($user->id);
        $data = [
                    'user_id' => $user->id,
                    'user' => $user->user,
                    'usercompanies' => $usercompanies
                ];
        return view('livewire.user-companies-component',$data);
    }
}
