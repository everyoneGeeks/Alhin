<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Notify;
/*
|--------------------------------------------------------------------------
| employeesController
|--------------------------------------------------------------------------
| this will handle all employee part (CRUD) 
|
*/
/*
                      _                       
                     | |                      
  ___ _ __ ___  _ __ | | ___  _   _  ___  ___ 
 / _ \ '_ ` _ \| '_ \| |/ _ \| | | |/ _ \/ _ \
|  __/ | | | | | |_) | | (_) | |_| |  __/  __/
 \___|_| |_| |_| .__/|_|\___/ \__, |\___|\___|
               | |             __/ |          
               |_|            |___/                    
*/
class employeesController extends Controller
{

/**  
* show list of Users
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $Employees=Employee::get();
    return view('pages.employee.list',compact('Employees'));
    }
    /**  
    * show info of  user By id
    * @pararm int $id user id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $Employee=Employee::with('cv')->where('id',$id)->first();

        return view('pages.employee.info',compact('Employee'));
    }
    /**  
    * change status of user (active / deactive)
    * @pararm int $id user id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function status($id){
        $Employee=Employee::where('id',$id)->first();
    
        if($Employee->is_active == 0){

            $Employee->is_active = '1';
            $Employee->save();

            Notify::success('تم تفعيل الموظف بنجاح', 'تغير حالة الموظف ');
        }else{
            $Employee->is_active = '0';
            $Employee->save();

            Notify::success('تم الغاء تفعيل الموظف بنجاح', 'تغير حالة الموظف ');
        }
    
        return back();
    }
    /**  
    * delete  employee
    * @pararm int $id user id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function delete($id){
        $Employee=Employee::where('id',$id)->delete();


            Notify::success('تم حذف  الموظف بنجاح', 'حذف  الموظف ');
        
    
        return back();
    }    
}
