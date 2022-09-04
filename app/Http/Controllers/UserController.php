<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view ("users");
    }
    public function EditProfile(){
        return view ('profile.edit_profile');
    }// end method

    public function EditPassword(){
        return view ('profile.change_password');
    }// end method
}
