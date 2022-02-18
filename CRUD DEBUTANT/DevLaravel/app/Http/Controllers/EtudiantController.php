<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Classe;
class EtudiantController extends Controller
{


    //AFFICHAGE DES ETUDIANTS PAR NOM EN ORDER CROISSANT
    public function index(){
        $etudiants=Etudiant::orderBy("nom","asc")->paginate(5);
        return view("pages/etudiant",compact("etudiants"));
    }




    //AFFICHAGE DES CLASSES
    public function create(){
        $classes=Classe::all();
        return view('pages/createEtudiant',compact("classes"));
    }





    //AJOUTE DES ETUDIANTS
    public function ajoute(Request $request){
        $request->validate([
           "nom"=>"required",
           "prenom"=>"required",
           "classe_id"=>"required",
        ]);

        // Si on  definie le fillable dans le model
        Etudiant::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "classe_id"=>$request->classe_id,
        ]);
        return back()->with("success","Etudiant ajouté avec succé!");
        // pour revenir au source de la requête et effiche ce message
    }




    //SUPPRESSION UN ETUDIANT
    public function suprimer($etudiant){
         $delete=Etudiant::find($etudiant);
         $nom_complet=$delete->nom." ".$delete->prenom;
         $delete->delete();
         return back()->with("successDelete","l'étudiant '$nom_complet' suprimé avec succèss!");
    }

    // si on veut utiliser l'injection d'independant delete
    // public function suprimer(Etudiant $etudiant){
    //       $nom_complet=$etudiant->nom."".$etudiant->prenom;
    //     $etudiant->delete();
    //     return back()->with("successDelete","l'étudiant '$nom_complet' suprimé avec succèss!");
    // }






    //AFFICHE ETUDIANT ID==$etudiant
    public function afficher($etudiant){
       $etudiantAffiche=Etudiant::find($etudiant);
       $classes=Classe::all();
       return view('pages/editEtudiant',compact("etudiantAffiche","classes"));
    }


    // si on veut utiliser l'injection d'independant affiche
    // public function afficher(Etudiant $etudiant){
    //    $classes=Classe::all();
    //  return view('pages/editEtudiant',compact("etudiant","classes"));
    // }







        //MODIFICATION DES ETUDIANTS

        public function modifier(Request $request,$etudiant){

            $AfficheEtudiant=Etudiant::find($etudiant);
            $request->validate([
               "nom"=>"required",
               "prenom"=>"required",
               "classe_id"=>"required",
            ]);

            $AfficheEtudiant->update([
                "nom"=>$request->nom,
                "prenom"=>$request->prenom,
                "classe_id"=>$request->classe_id,
            ]);
            return back()->with("success","Etudiant mise a jour avec succé!");
            // pour revenir au source de la requête et effiche ce session
        }



        // si on veut utiliser l'injection d'independant update
        // public function modifier(Request $request, Etudiant $etudiant){
        //     $request->validate([
        //        "nom"=>"required",
        //        "prenom"=>"required",
        //        "classe_id"=>"required",
        //     ]);

        //     $etudiant->update([
        //         "nom"=>$request->nom,
        //         "prenom"=>$request->prenom,
        //         "classe_id"=>$request->classe_id,
        //     ]);
        //     return back()->with("success","Etudiant mise a jour avec succé!");
        //     // pour revenir au source de la requête et effiche ce session
        // }


}
