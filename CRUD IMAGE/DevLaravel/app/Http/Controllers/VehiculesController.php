<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicules;
use Illuminate\Support\Facades\File;

class VehiculesController extends Controller
{


    public function index(){
      $vehicule=Vehicules::all();
      return view('pages/home',compact('vehicule'));
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
     return redirect()->back()->with('status',"vehicule ajouter avec success!");
    }


    public function edit($id){
    $vehicule=Vehicules::find($id);
     return view('pages/edit',compact('vehicule'));
    }


    public function updat(Request $request,$id){
      $vehicule=Vehicules::find($id);
      $vehicule->nomVehicule=$request->input('nomVehicule');
      $vehicule->numeroVehicule=$request->input('numeroVehicule');
      if($request->hasfile('imageVehicule')){
          $destination='uploads/vehicules/'.$vehicule->imageVehicule;
          if(File::exists($destination)){
              File::delete($destination);
          }
          $file=$request->file('imageVehicule');
          $extension=$file->getClientOriginalExtension();
          $filname=time().'.'.$extension;
          $file->move('uploads/vehicules/',$filname);
          $vehicule->imageVehicule=$filname;
      }
      $vehicule->update();
      return redirect()->back()->with('status',"vehicule Update avec success!");
    }

    public function delete($id){
      $vehicule=Vehicules::find($id);
      $destination="uploads/vehicules/".$vehicule->imageVehicule;
      if(File::exists($destination)){
          File::delete($destination);
      }
      $vehicule->delete();
      return redirect()->back()->with('status',"vehicule Delete avec success!");
    }

}
