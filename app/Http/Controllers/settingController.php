<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Notify;
/*
|--------------------------------------------------------------------------
| settingController
|--------------------------------------------------------------------------
| this will handle all setting part (CRUD) 
|
*/
/**

          _   _   _             
         | | | | (_)            
 ___  ___| |_| |_ _ _ __   __ _ 
/ __|/ _ \ __| __| | '_ \ / _` |
\__ \  __/ |_| |_| | | | | (_| |
|___/\___|\__|\__|_|_| |_|\__, |
                           __/ |
                          |___/ 
 */
class settingController extends Controller
{
/**  
* show list of setting
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $setting=Setting::where('id',1)->first();
    return view('pages.setting.list',compact('setting'));
    }


    /**  
    * show edit of  setting By id
    * @pararm int $id setting id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function edit($id){
        $setting=setting::where('id',$id)->first();
        return view('pages.setting.edit',compact('setting'));
    }



    /**  
    *  submit edit of setting By id
    * @pararm int $id setting id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function editSubmit(Request $request,$id){
        $setting=setting::where('id',$id)->first();
        $setting->about_us_ar=$request->about_us_ar;
        $setting->about_us_en=$request->about_us_en;
        $setting->terms_conditions_ar=$request->terms_conditions_ar;
        $setting->terms_conditions_en=$request->terms_conditions_en;
        $setting->save();
        \Notify::success('تم تعديل  الاعدادات بنجاح', ' تعديل الاعدادات  ');
        return redirect()->to('/setting');
    }    
}
