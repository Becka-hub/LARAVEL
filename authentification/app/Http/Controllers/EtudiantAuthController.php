<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EtudiantAuthController extends Controller
{
    public function login(){
        return view('page/login');
    }
    public function inscription(){
        return view('page/inscription');
    }

    public function create(Request $request){

    // return $request->input();
    // Pour test que les request sont bien arriver au controller

    $request->validate([
        'nomEtudiant'=>'required',
        'prenomEtudiant'=>'required',
        'mailEtudiant'=>'required|email|unique:etudiant',
        'mdpEtudiant'=>'required|min:5|max:12'
    ]);

    $data=array(
        'nomEtudiant'=>$request->nomEtudiant,
        'prenomEtudiant'=>$request->prenomEtudiant,
        'mailEtudiant'=>$request->mailEtudiant,
        'mdpEtudiant'=>Hash::make($request->mdpEtudiant)
    );

    $resultat=DB::table('etudiant')->insert($data);

    if($resultat){
        return back()->with('success','Inscription avec success');
    }else{
        return back()->with('error','Inscription error');
    }

    }


    public function check(Request $request){

    // return $request->input();
    // Pour test que les request sont bien arriver au controller

    $request->validate([
        'mailEtudiant'=>'required|email',
        'mdpEtudiant'=>'required|min:5|max:12'
    ]);

    $etudiant=DB::table('etudiant')->where('mailEtudiant',$request->mailEtudiant)->first();

    if($etudiant){

       if(Hash::check($request->mdpEtudiant, $etudiant->mdpEtudiant)){
         // if existe r->mdpE and e->mdpE

         $request->session()->put('LoggedEtudiant',$etudiant->idEtudiant);
         // creation d'un session

         return redirect('profile');

       }else{
          return back()->with('error','Mot de passe incorrect');
       }


    }else{
        return back()->with('error','Pas de compte pour cette email');
    }



    }


    public function profile(){

        if(session()->has('LoggedEtudiant')){
            // if loggedEtudiant exist

            $etudiant=DB::table('etudiant')->where('idEtudiant',session('LoggedEtudiant'))->first();
            $data=[
                'LoggedEtudiantInfo'=>$etudiant
            ];
        }
        return view('page/profile',$data);
    }



    public function logout(){

        if(session()->has('LoggedEtudiant')){
            session()->pull('LoggedEtudiant');
            return redirect('login');
        }
    }


}
