<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\nationality;
/*
|--------------------------------------------------------------------------
| nationalitysController
|--------------------------------------------------------------------------
| this will handle all nationalitys part (CRUD) 
|
*/
/**

             _   _                   _ _ _             
            | | (_)                 | (_) |            
 _ __   __ _| |_ _  ___  _ __   __ _| |_| |_ _   _ ___ 
| '_ \ / _` | __| |/ _ \| '_ \ / _` | | | __| | | / __|
| | | | (_| | |_| | (_) | | | | (_| | | | |_| |_| \__ \
|_| |_|\__,_|\__|_|\___/|_| |_|\__,_|_|_|\__|\__, |___/
                                              __/ |    
                                             |___/     
 */
class nationalitysController extends Controller
{
/**  
* show list of nationality
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $nationalitys=nationality::get();
    return view('pages.nationality.list',compact('nationalitys'));
    }

    /**  
    * show edit of  nationality By id
    * @pararm int $id nationality id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function edit($id){
        $nationality=nationality::where('id',$id)->first();
        return view('pages.nationality.edit',compact('nationality'));
    }



    /**  
    *  submit edit of nationality By id
    * @pararm int $id nationality id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function editSubmit(Request $request,$id){
        $nationality=nationality::where('id',$id)->first();
        $nationality->nationality_ar=$request->nationality_ar;
        $nationality->nationality_en=$request->nationality_en;
        $nationality->save();
        \Notify::success('تم تعديل  الجنسية بنجاح', ' تعديل الجنسية  ');
        return redirect()->to('/nationalitys');
    }


    /**  
    * show add of  nationality By id
    * @pararm int $id nationality id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function add(){

        return view('pages.nationality.add');
    }

    /**  
    *  addSubmit of nationality By id
    * @pararm int $id nationality id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function addSubmit(Request $request){
        $nationality=new nationality;
        $nationality->nationality_ar=$request->nationality_ar;
        $nationality->nationality_en=$request->nationality_en;
        $nationality->created_at=\Carbon\Carbon::now();
        $nationality->save();

        return redirect()->to('/nationalitys');
    }





    /**  
    * delete nationality  By id
    * @pararm int $id nationality id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function delete($id){
        $nationality=nationality::where('id',$id)->delete();

        \Notify::success('تم حذف  الجنسية بنجاح', ' حذف الجنسية  ');
        return redirect()->to('/nationalitys');
        
    }
}
