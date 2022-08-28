<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SecretaireController extends Controller
{
    public function Index(){
        return view('secretaire.secretaire_login');
    } //end methode

    public function Dashboard(){
        return view('secretaire.index');
    } //end methode

    public function Gestion_RDV(){
        return view('secretaire.gestion_des_rdv');
    } //end methode

    public function Login(Request $request){
        //dd($request->all());

        $check = $request->all();
        if(Auth::guard('secretaire')->attempt(['email'=>$check['email'], 'password'=> $check['password']])){
            return redirect()->route('secretaire.dashboard')->with('success','Secrétaire Login Successfully');
        }else{

        return back()->with('error','Invalid Email Or Password');
        }
        
    }// end method

    
    public function SecretaireLogout(Request $request){
      
        Auth::guard('secretaire')->logout(); 
            return redirect()->route('secretaire_login_from')->with('success','Secrétaire Logout Successfully');
        
        
    }// end method

}
