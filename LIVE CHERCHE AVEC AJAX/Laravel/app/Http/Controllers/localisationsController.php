<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class localisationsController extends Controller
{
    function action(Request $request){

        if($request->ajax()){
            $query = $request->get('query');

            $output ='';
            if($query!=''){
                $data= DB::table('localisations')
                       ->where('CustomerName','like','%'.$query.'%')
                       ->orWhere('Adress','like','%'.$query.'%')
                       ->orWhere('city','like','%'.$query.'%')
                       ->orWhere('PostalCode','like','%'.$query.'%')
                       ->orWhere('Country','like','%'.$query.'%')
                       ->orderBy('id','desc')
                       ->get();
            }else{
               $data= DB::table('localisations')
                     ->orderBy('id','desc')
                     ->get();
            }


            $total_row = $data->count();


            if($total_row > 0){
                foreach($data as $row){
                   $output .='
                   <tr>
                   <td>'.$row->CustomerName.'</td>
                   <td>'.$row->Adress.'</td>
                   <td>'.$row->city.'</td>
                   <td>'.$row->PostalCode.'</td>
                   <td>'.$row->Country.'</td>
                   </tr>
                   ';
                }
            }else{
              $output='
              <tr>
              <td align="center" colspan="5">No Data Found</td>
              </tr>
              ';
            }

            $data=array(
                'table_data'=>$output,
                'total_data'=>$total_row,
            );

            return response()->json($data);


        }
    }
}
