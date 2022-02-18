<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepasController extends Controller
{


   public function ajouteRepas(Request $request){
    $request->validate([
        "nomRepas"=>"required",
        "prixRepas"=>"required",
        "prixEmballage"=>"required",
        "prixServiette"=>"required",
        "prixCouvert"=>"required",
     ]);
     $data=array(
        'NOMREPAS'=>$request->input('nomRepas'),
         'PRIXREPAS'=>$request->input('prixRepas'),
          'PRIXEMBALLAGE'=>$request->input('prixEMballage'),
          'PRIXSERVIETTE'=>$request->input('prixServiette'),
          'PRIXCOUVERT'=>$request->input('prixCouvert'),
     );
     $resultat=DB::table('repas')->insert($data);
     if($resultat){
        return response()->json(['message'=>"Insertions repas avec success"], 200);
     }else{
        return response()->json(['message'=>"Insertions repas avec success"], 404);
     }

    }



    public function afficheRepas(){
        $repas=DB::table('repas')->get();
        return response()->json($repas, 200);
    }




    public function afficheUnRepas($id){
        $repas=DB::table('repas')->where('IDREPAS',$id)->first();
        return response()->json($repas, 200);
    }


    public function modifierRepas(Request $request, $id){
        $request->validate([
            'nomRepas'=>'required',
            'prixRepas'=>'required',
            'prixEMballage'=>'required',
            'prixServiette'=>'required',
            'prixCouvert'=>'required',
            ]);
            $data=array(
               'NOMREPAS'=>$request->input('nomRepas'),
                'PRIXREPAS'=>$request->input('prixRepas'),
                 'PRIXEMBALLAGE'=>$request->input('prixEMballage'),
                 'PRIXSERVIETTE'=>$request->input('prixServiette'),
                 'PRIXCOUVERT'=>$request->input('prixCouvert'),
            );
            $resultat=DB::table('repas')->where('IDREPAS',$id)->update($data);

            if($resultat){
                return response()->json(['message'=>"Modification repas avec success,"],200);
            }else{
                return response()->json(['message'=>"Modification repas erreur,"],404);
            }


    }



    public function suprimerRepas($id){
        $repas=DB::table('repas')->where('IDREPAS',$id)->delete();
        if($repas){
            return response()->json(['message'=>"Supression repas avec success,"],200);
        }else{
            return response()->json(['message'=>"Supression repas erreur!"],404);
        }
    }

}
