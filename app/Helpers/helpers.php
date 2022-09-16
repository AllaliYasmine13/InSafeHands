<?php

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Rdvs;

// function UserName(){
//     return auth()->user()->nom . " " . auth()->user()->prenom;
// }

function userFullName(){
    return auth()->user()->name;
}

function UserCounter(){
    $data = DB::table('users')->count();
    return collect($data);
  }

function RdvsCounter(){
    $data = DB::table('rdvs')->count();
    return collect($data);
  }

function PatientsCounter(){
    $data = DB::table('patients_agees')->count();
    return collect($data);
  }

function contains($container, $contenu){
    return Str::contains($container, $contenu);
}

function getRolesName(){
    $rolesName = "";
    $i = 0;
    foreach(auth()->user()->roles as $role){
        $rolesName .= $role->name;

        //
        if($i < sizeof(auth()->user()->roles) - 1 ){
            $rolesName .= ",";
        }

        $i++;

    }

    return $rolesName;

}

// function userFullName(){
//     return auth()->user()->name;
// }

// function usergetEmail(){
//     return auth()->user()->email;
// }
