<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\residenceCountry;
/*
|--------------------------------------------------------------------------
| CountriesController
|--------------------------------------------------------------------------
| this will handle all Countries part (CRUD) 
|
*/
/**

  _____                  _        _           
 / ____|                | |      (_)          
| |     ___  _   _ _ __ | |_ _ __ _  ___  ___ 
| |    / _ \| | | | '_ \| __| '__| |/ _ \/ __|
| |___| (_) | |_| | | | | |_| |  | |  __/\__ \
 \_____\___/ \__,_|_| |_|\__|_|  |_|\___||___/
 */
class CountriesController extends Controller
{
/**  
* show list of Countries
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $countries=residenceCountry::get();
    return view('pages.country.list',compact('countries'));
    }

    /**  
    * show edit of  country By id
    * @pararm int $id country id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function edit($id){
        $country=residenceCountry::where('id',$id)->first();
        return view('pages.country.edit',compact('country'));
    }



    /**  
    *  submit edit of country By id
    * @pararm int $id country id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function editSubmit(Request $request,$id){
        $country=residenceCountry::where('id',$id)->first();
        $country->country_ar=$request->country_ar;
        $country->country_en=$request->country_en;
        $country->save();
        \Notify::success('تم تعديل  الدولة بنجاح', ' تعديل الدولة  ');
        return redirect()->to('/countries');
    }


    /**  
    * show add of  country By id
    * @pararm int $id country id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function add(){

        return view('pages.country.add');
    }

    /**  
    *  addSubmit of country By id
    * @pararm int $id country id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function addSubmit(Request $request){
        $country=new residenceCountry;
        $country->country_ar=$request->country_ar;
        $country->country_en=$request->country_en;
        $country->created_at=\Carbon\Carbon::now();
        $country->save();

        return redirect()->to('/countries');
    }





    /**  
    * delete country  By id
    * @pararm int $id country id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function delete($id){
        $country=residenceCountry::where('id',$id)->delete();

        \Notify::success('تم حذف  الدولة بنجاح', ' حذف الدولة  ');
        return redirect()->to('/countries');
        
    }

}
