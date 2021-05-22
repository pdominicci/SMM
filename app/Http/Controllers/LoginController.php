<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserCompanies;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function usercompanies(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $usercompanies = UserCompanies::where('user_id', $user->id)->get();
            $data = [];
            $item = [];
            foreach($usercompanies as $uc){
                $item = ["company_id" => $uc->company_id, "company" => $uc->companies->company];
                array_push($data, $item);
            }
        } else {
            $data = [];
        }
        return response()->json($data);
    }
}
