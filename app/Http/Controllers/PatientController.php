<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PatientController extends Controller
{
    public function Index(){
        return view('patient.patient_login');
    } //end methode

    public function Dashboard(){
        return view('patient.index');
    } //end methode

    public function Consultation_RDV(){
        return view('patient.consultation_des_rdv');
    } //end methode

    public function Consultation_certificat(){
        return view('patient.consultation_certificat');
    } //end methode

    public function Login(Request $request){
        //dd($request->all());

        $check = $request->all();
        if(Auth::guard('patient')->attempt(['email'=>$check['email'], 'password'=> $check['password']])){
            return redirect()->route('patient.dashboard')->with('success','Patient Login Successfully');
        }else{

        return back()->with('error','Invalid Email Or Password');
        }
        
    }// end method

    public function PatientLogout(Request $request){
      
        Auth::guard('patient')->logout(); 
            return redirect()->route('patient_login_from')->with('success','Patient Logout Successfully');
        
        
    }// end method
}
