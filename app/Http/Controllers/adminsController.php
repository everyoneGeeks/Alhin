<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| adminsController
|--------------------------------------------------------------------------
| this will handle all admins part (CRUD) 
|
*/
/**
           | |         (_)          
   __ _  __| |_ __ ___  _ _ __  ___ 
  / _` |/ _` | '_ ` _ \| | '_ \/ __|
 | (_| | (_| | | | | | | | | | \__ \
  \__,_|\__,_|_| |_| |_|_|_| |_|___/
 */
class adminsController extends Controller
{
/**  
* show list of admins
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $admins=User::get();
    return view('pages.admin.list',compact('admins'));
    }
    /**  
    * show info of  admin By id
    * @pararm int $id admin id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function info($id){
        $admin=User::where('id',$id)->first();
        return view('pages.admin.info',compact('admin'));
    }
    /**  
    * change status of category (active / deactive)
    * @pararm int $id category id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function status($id){
        $category=category::where('id',$id)->first();
    
        if($category->is_active == 0){
            $category->is_active = 1;
            $category->save();
            \Notify::success('تم تفعيل القسم بنجاح', 'تغير حالة القسم  ');
        }else{
            $category->is_active = 0;
            $category->save();
            \Notify::success('تم الغاء تفعيل القسم بنجاح', 'تغير حالة القسم ');
        }
    
        return redirect()->back();
    }

    /**  
    * show  form edit  of  category By id 
    * @pararm int $id category id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $category=category::where('id',$id)->first();
        return view('pages.categories.edit',compact('category'));
    }    

    /**  
    * save edit  of  category By id 
    * @pararm int $id category id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

        $rules=['name_ar'=>'required','name_en'=>'required'];
        $message=['name_ar.required'=>'يجب ادخال اسم القسم ','name_en.required'=>'يجب ادخال اسم القسم'];
        $request->validate($rules,$message);

        $category=category::where('id',$id)->first();
        $category->name_ar=$request->name_ar;
        $category->name_en=$request->name_en;
        $category->is_active=$request->active ? $request->active : 0;
        if($request->hasFile('logo')){
            $this->SaveFile($category,'logo','logo','upload/category');
        }

        $category->created_at=Carbon::now();
        $category->save();

        \Notify::success('تم تعديل بيانات القسم بنجاح', ' تعديل بيانات القسم   ');
        return redirect()->back();
    }  


    /**  
    * show  form add  of  admins 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formAdd(){
        return view('pages.admin.add');
    }    

    /**  
    * save add  of  admin 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitAdd(Request $request){

    $rules=['name'=>'required','email'=>'required','password'=>'required|min:8'];
    $message=['name.required'=>'يجب ادخال الاسم  ',
    'email.required'=>'يجب ادخال الايميل ','password.required'=>'يجب ادخال الرقم السري ',
    'password.min'=>'يجب ادخال ان يكون الرقم السري اكبر من 8'];
    $request->validate($rules,$message);
if($request->admin == 1){
    $admin=new User;
    $admin->name=$request->name;
    $admin->email=$request->email;
    $admin->password=\Hash::make($request->password);
    $admin->is_super_admins=1;
    $admin->created_at=Carbon::now();
    $admin->save();

}else{
    $permissions=['users'=>['add'=>$request->addusers,'edit'=>$request->editusers,'delete'=>$request->deleteusers]];
    $admin=new User;
    $admin->name=$request->name;
    $admin->email=$request->email;
    $admin->password=\Hash::make($request->password);
    $admin->is_super_admins=1;
    $admin->permissions=json_encode($permissions);
    $admin->created_at=Carbon::now();
    $admin->save();
}

if($request->admin == 1){
    \Notify::success('تم اضافة  ادمن جديد بنجاح', '  اضافة ادمن ');
}else{
    \Notify::success('تم اضافة  مسئول جديد بنجاح', '  اضافة مسئول ');
}
        return redirect()->back();
    }  

    
}
