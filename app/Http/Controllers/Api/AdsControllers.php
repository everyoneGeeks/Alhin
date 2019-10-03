<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ads as adsResource;
use App\Ads;

class AdsControllers extends Controller
{
    /**  
    * This api will be used to get Ads
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @param $request Illuminate\Http\Request;
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function getAds(){
            try{
        #Start logic    
        $Ads=Ads::get();
              if($Ads == NULL){
                return response()->json(['status'=>204]);
              }
        return response()->json(['status'=>200,'ads'=>adsResource::collection($Ads)]);
        #end logic
                }catch(Exception $e) {
                   return response()->json(['status' =>404]);
                 }
            }// end funcrion    
}
