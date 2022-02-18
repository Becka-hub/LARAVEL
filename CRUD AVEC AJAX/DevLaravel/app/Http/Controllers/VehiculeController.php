<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;

class VehiculeController extends Controller
{

    public function listeVehicule(){
        $table='<table class="table table-border-danger table-striped">
        <tr>
        <th>N°</th>
        <th>Nom</th>
        <th>Numero</th>
        <th>Couleur</th>
        <th>Proprietaire</th>
        <th>Edit</th>
        <th>Delete</th>
        </tr>
         ';
         $donner=Vehicule::orderBy("nom","asc")->get();
         $number=1;
        foreach($donner as $liste){
            $table .='
            <tr class="">
            <td>'.$number.'</td>
            <td>'.$liste->nom.'</td>
            <td>'.$liste->numero.'</td>
            <td>'.$liste->couleur.'</td>
            <td>'.$liste->proprietaire.'</td>
            <td> <button class="btn  btn-outline-success" data-toggle="modal" data-target="#ModelUpdate" onclick="GetVehicule('.$liste->id.')"> EDIT</button> </td>
            <td> <button class="btn btn-outline-danger" onclick="Delete('.$liste->id.')"> DELETE</button> </td>
            </tr>


           ';
           $number++;
        }

        $table .='
        </table>

        ';

        return $table;
    }




    public function deleteVehicule($id){
        $donner=Vehicule::find($id);
        $message="Le vehicule ".$donner->nom." numéro ".$donner->numero." est suprimer avec success";
        $donner->delete();
        return response()->json($message);

    }



    public function ajouteVehicule(Request $request){
        $request->validate([
            "nom"=>"required",
            "numero"=>"required",
            "couleur"=>"required",
            "proprietaire"=>"required",
          ]);
     Vehicule::create([
       "nom"=>$request->nom,
       "numero"=>$request->numero,
       "couleur"=>$request->couleur,
       "proprietaire"=>$request->proprietaire,
     ]);
     return response()->json("Ajouter Vehicule avec success");
    }




    public function recupereVehicule($id){
        $donner=Vehicule::findOrFail($id);
        return response()->json($donner);
    }




    public function modifierVehicule(Request $request,$id){
       $request->validate([
         "nom"=>"required",
         "numero"=>"required",
         "couleur"=>"required",
         "proprietaire"=>"required",
       ]);
       $data=Vehicule::findOrFail($id);
       $data->update([
        "nom"=>$request->nom,
        "numero"=>$request->numero,
        "couleur"=>$request->couleur,
        "proprietaire"=>$request->proprietaire,
      ]);
      return response()->json("Modification Vehicule avec success");
    }

}
