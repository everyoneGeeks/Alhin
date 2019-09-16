<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
/*
|--------------------------------------------------------------------------
| usersControllers
|--------------------------------------------------------------------------
| this will handle all user part (CRUD) 
|
*/
/*
  _   _ ___  ___ _ __ ___ 
 | | | / __|/ _ \ '__/ __|
 | |_| \__ \  __/ |  \__ \
  \__,_|___/\___|_|  |___/                         
*/
class usersControllers extends Controller
{

/**  
* show list of Users
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
$users=Users::get();
return view('page.users.list',compact('users'));
}
/**  
* show info of  user By id
* @pararm int $id user id 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function info($id){
    $user=Users::where('id',$id)->first();
    return view('page.users.info',compact('user'));
}
/**  
* change status of user (active / deactive)
* @pararm int $id user id 
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function status($id){
    $user=Users::where('id',$id)->first();

    if($user->is_active == 0){
        $user->is_active == 1;
        $user->save();
        Notify::success('تم تفعيل المستخدم بنجاح', 'تغير حالة المستخدم ');
    }else{
        $user->is_active == 0;
        $user->save();
        Notify::success('تم الغاء تفعيل المستخدم بنجاح', 'تغير حالة المستخدم ');
    }

    return view('page.users.info',compact('user'));
}

}
