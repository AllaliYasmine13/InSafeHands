<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function Calendar(){
        return view ('calendar');
    }// end method

    public function Gestion_Rdvs(){
        return view ('gestion_des_rdvs');
    }// end method

    public function EditProfile(){
        return view ('profile.edit_profile');
    }// end method

    public function EditPassword(){
        return view ('profile.change_password');
    }// end method
}
