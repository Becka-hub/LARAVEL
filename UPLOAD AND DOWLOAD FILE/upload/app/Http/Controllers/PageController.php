<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use App\Models\Produit;

class PageController extends Controller
{
    public function store(Request $request){
      $data=new Produit();
      $file=$request->file;
      $filename=time().'.'.$file->getClientOriginalExtension();
      $request->file->move('assets',$filename);
      $data->file=$filename;
      $data->name=$request->name;
      $data->description=$request->description;
      $data->save();
      return redirect()->back();
    }


    public function show(){
        $data= Produit::all();
        return view('pages/view',compact('data'));
    }

    public function download(Request $request,$file){
       return response()->download(public_path('assets/'.$file));
    }

    public function view($id){
       $data = Produit::find($id);
       return view('pages/viewproduit',compact('data'));
    }
}
