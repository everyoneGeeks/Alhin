<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\religion;
/*
|--------------------------------------------------------------------------
| religionsController
|--------------------------------------------------------------------------
| this will handle all religions part (CRUD) 
|
*/
/**

          _ _       _                 
         | (_)     (_)                
 _ __ ___| |_  __ _ _  ___  _ __  ___ 
| '__/ _ \ | |/ _` | |/ _ \| '_ \/ __|
| | |  __/ | | (_| | | (_) | | | \__ \
|_|  \___|_|_|\__, |_|\___/|_| |_|___/
               __/ |                  
              |___/    
 */
class religionsController extends Controller
{
/**  
* show list of religions
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $religions=religion::get();
    return view('pages.religion.list',compact('religions'));
    }

    /**  
    * show edit of  religion By id
    * @pararm int $id religion id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function edit($id){
        $religion=religion::where('id',$id)->first();
        return view('pages.religion.edit',compact('religion'));
    }



    /**  
    *  submit edit of religion By id
    * @pararm int $id religion id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function editSubmit(Request $request,$id){
        $religion=religion::where('id',$id)->first();
        $religion->religion_ar=$request->religion_ar;
        $religion->religion_en=$request->religion_en;
        $religion->save();
        \Notify::success('تم تعديل  الديانة بنجاح', ' تعديل الديانة  ');
        return redirect()->to('/religions');
    }


    /**  
    * show add of  religion By id
    * @pararm int $id religion id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function add(){

        return view('pages.religion.add');
    }

    /**  
    *  addSubmit of religion By id
    * @pararm int $id religion id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function addSubmit(Request $request){
        $religion=new religion;
        $religion->religion_ar=$request->religion_ar;
        $religion->religion_en=$request->religion_en;
        $religion->created_at=\Carbon\Carbon::now();
        $religion->save();

        return redirect()->to('/religions');
    }





    /**  
    * delete religion  By id
    * @pararm int $id country id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function delete($id){
        $religion=religion::where('id',$id)->delete();

        \Notify::success('تم حذف  الديانة بنجاح', ' حذف الديانة  ');
        return redirect()->to('/religions');
        
    }
}
