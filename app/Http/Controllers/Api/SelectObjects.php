<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\residenceCountry as ResourcesCountry;
use App\Http\Resources\religion as ResourcesReligion;
use App\Http\Resources\nationality as ResourcesNationality;

use App\religion;
use App\nationality;
use App\residenceCountry;

class SelectObjects extends Controller
{
/**  
* This api will to get residence Country 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function residenceCountry(Request $request){
        try{
    #Start logic
    $residenceCountry=residenceCountry::get();
    #check if empty
    if($residenceCountry->isEmpty()){
        return response()->json(['status'=>204]);
    }
    return response()->json(['status'=>200,'residenceCountry'=>ResourcesCountry::collection($residenceCountry)]);
    #end logic
            }catch(Exception $e) {
               return response()->json(['status' =>404]);
             }
        }// end funcrion
        
/**  
* This api will to get religion
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function religion(Request $request){
    try{
        #Start logic
        $religion=religion::get();
        #check if empty
        if($religion->isEmpty()){
            return response()->json(['status'=>204]);
        }
        return response()->json(['status'=>200,'religion'=>ResourcesReligion::collection($religion)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
    }// end funcrion     
    
    
/**  
* This api will to get nationality
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @param $request Illuminate\Http\Request;
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function nationality(Request $request){
    try{
        #Start logic
        $nationality=nationality::get();
        #check if empty
        if($nationality->isEmpty()){
            return response()->json(['status'=>204]);
        }
        return response()->json(['status'=>200,'nationality'=>ResourcesNationality::collection($nationality)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
    }// end funcrion      
}
