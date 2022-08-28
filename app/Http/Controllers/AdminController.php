<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    } // end method

    public function Dashboard(){
        return view('admin.index');
    }// end method

    public function Certificat_Medical(){
        return view('admin.certificat_medical');
    }// end method


    public function Utilisateurs(){
        return view('admin.utilisateurs');
    }// end method

    public function Contact(){
        return view('admin.contact');
    }// end method


    public function Statistique(){
        return view('admin.statistiques');
    }// end method

    public function Login(Request $request){
        //dd($request->all());

        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email'=>$check['email'], 'password'=> $check['password']])){
            return redirect()->route('admin.dashboard')->with('success','Admin Login Successfully');
        }else{

        return back()->with('error','Invalid Email Or Password');
        }
        
    }// end method

    public function AdminLogout(Request $request){
      
        Auth::guard('admin')->logout(); 
            return redirect()->route('login_from')->with('success','Admin Logout Successfully !');
        
        
    }// end method


}
