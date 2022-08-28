<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MedecinController extends Controller
{
    public function Index(){
        return view('medecin.medecin_login');
    } //end methode

    public function Dashboard(){
        return view('medecin.index');
    } //end methode

    public function Login(Request $request){
        //dd($request->all());

        $check = $request->all();
        if(Auth::guard('medecin')->attempt(['email'=>$check['email'], 'password'=> $check['password']])){
            return redirect()->route('medecin.dashboard')->with('success','Médecin Login Successfully');
        }else{

        return back()->with('error','Invalid Email Or Password');
        }
        
    }// end method

    
    public function MedecinLogout(Request $request){
      
        Auth::guard('medecin')->logout(); 
            return redirect()->route('medecin_login_from')->with('success','Médecin Logout Successfully');
        
        
    }// end method

}
