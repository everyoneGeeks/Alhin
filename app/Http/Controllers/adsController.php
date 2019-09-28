<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ads;
use Notify;
/*
|--------------------------------------------------------------------------
| adsController
|--------------------------------------------------------------------------
| this will handle all ads part (CRUD) 
|
*/    
/**
           _     
          | |    
  __ _  __| |___ 
 / _` |/ _` / __|
| (_| | (_| \__ \
 \__,_|\__,_|___/
 */
class adsController extends Controller
{
/**  
* show list of Ads
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $Ads=Ads::get();
    return view('pages.ads.list',compact('Ads'));
    }

    /**  
    * show edit of  Ads By id
    * @pararm int $id Ads id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function edit($id){
        $Ads=Ads::where('id',$id)->first();
        return view('pages.ads.edit',compact('Ads'));
    }



    /**  
    *  submit edit of Ads By id
    * @pararm int $id Ads id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function editSubmit(Request $request,$id){
        $Ads=Ads::where('id',$id)->first();
        $Ads->url=$request->url;
        $this->SaveFile($Ads,'image','image','image');
        $Ads->save();
        \Notify::success('تم تعديل  الاعلان بنجاح', ' تعديل الاعلان  ');
        return redirect()->to('/ads');
    }


    /**  
    * show add of  Ads By id
    * @pararm int $id Ads id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function add(){

        return view('pages.ads.add');
    }

    /**  
    *  addSubmit of Ads By id
    * @pararm int $id Ads id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function addSubmit(Request $request){
        $Ads=new Ads;
        $Ads->url=$request->url;
        $this->SaveFile($Ads,'image','image','image');
        $Ads->created_at=\Carbon\Carbon::now();
        $Ads->save();



        return redirect()->to('/ads');
    }





    /**  
    * delete Ads  By id
    * @pararm int $id Ads id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function delete($id){
        $Ads=Ads::where('id',$id)->delete();

        \Notify::success('تم حذف  الاعلان بنجاح', ' حذف الاعلان  ');
        return redirect()->to('/ads');
        
    }
}
