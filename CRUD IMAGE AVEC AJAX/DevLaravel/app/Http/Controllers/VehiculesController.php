<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicules;
use Illuminate\Support\Facades\File;
use Image;
class VehiculesController extends Controller
{


    public function index(){
      $vehicule=Vehicules::all();

      $table='<table class="table table-border-danger table-striped">
      <tr>
      <th>ID</th>
      <th>NOM</th>
      <th>NUMERO</th>
      <th>IMAGE</th>
      <th>Edit</th>
      <th>Delete</th>
      </tr>
       ';
       $donner=Vehicules::orderBy("nomVehicule","asc")->get();
       $number=1;
      foreach($donner as $liste){
          $table .='
          <tr class="">
          <td>'.$number.'</td>
          <td>'.$liste->nomVehicule.'</td>
          <td>'.$liste->numeroVehicule.'</td>
          <td><img src="uploads/vehicules/'.$liste->imageVehicule.'" alt="image" height="80px" width="80px"></td>
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


    public function add(Request $request){
     $vehicule=new Vehicules;
     $vehicule->nomVehicule=$request->input('nomVehicule');
     $vehicule->numeroVehicule=$request->input('numeroVehicule');
     if($request->hasfile('imageVehicule')){
         $file=$request->file('imageVehicule');
         $extension=$file->getClientOriginalExtension();
         $filname=time().'.'.$extension;
         $file->move('uploads/vehicules/',$filname);
         $vehicule->imageVehicule=$filname;
     }
     $vehicule->save();
     return response()->json("Ajouter Vehicule avec success");
    }


    public function edit($id){
    $vehicule=Vehicules::find($id);
    return response()->json($vehicule);
    }


    public function updat(Request $request,$id){
      $vehicule=Vehicules::find($id);
      $vehicule->nomVehicule=$request->input('nom');
      $vehicule->numeroVehicule=$request->input('numero');
      if($request->hasfile('image')){
          $destination='uploads/vehicules/'.$vehicule->imageVehicule;
          if(File::exists($destination)){
              File::delete($destination);
          }
          $file=$request->file('image');
          $extension=$file->getClientOriginalExtension();
          $filname=time().'.'.$extension;
          $file->move('uploads/vehicules/',$filname);
          $vehicule->imageVehicule=$filname;
      }
      $vehicule->update();
      return response()->json("Modification Vehicule avec success");
    }



    public function delete($id){
      $vehicule=Vehicules::find($id);
      $message="Le vehicule ".$vehicule->nomVehicule." numéro ".$vehicule->numeroVehicule." est suprimer avec success";
      $destination="uploads/vehicules/".$vehicule->imageVehicule;
      if(File::exists($destination)){
          File::delete($destination);
      }
      $vehicule->delete();
      return response()->json($message);;
    }



}
