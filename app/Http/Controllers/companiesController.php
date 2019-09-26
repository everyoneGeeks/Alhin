<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Notify;
/*
|--------------------------------------------------------------------------
| companiesController
|--------------------------------------------------------------------------
| this will handle all company part (CRUD) 
|
*/
/**
                                       _           
                                      (_)          
  ___ ___  _ __ ___  _ __   __ _ _ __  _  ___  ___ 
 / __/ _ \| '_ ` _ \| '_ \ / _` | '_ \| |/ _ \/ __|
| (_| (_) | | | | | | |_) | (_| | | | | |  __/\__ \
 \___\___/|_| |_| |_| .__/ \__,_|_| |_|_|\___||___/
                    | |                            
                    |_|  
 */
class companiesController extends Controller
{
/**  
* show list of companies
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $companies=Company::get();
    return view('pages.company.list',compact('companies'));
    }

    /**  
    * show info of  company By id
    * @pararm int $id company id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $company=Company::with('job')->where('id',$id)->first();
        return view('pages.company.info',compact('company'));
    }
    /**  
    * change status of Company (active / deactive)
    * @pararm int $id Company id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function status($id){
        $Company=Company::where('id',$id)->first();
    
        if($Company->is_active == 0){

            $Company->is_active = '1';
            $Company->save();

            Notify::success('تم تفعيل المستخدم بنجاح', 'تغير حالة المستخدم ');
        }else{
            $Company->is_active = '0';
            $Company->save();

            Notify::success('تم الغاء تفعيل المستخدم بنجاح', 'تغير حالة المستخدم ');
        }
    
        return back();
    }

}
