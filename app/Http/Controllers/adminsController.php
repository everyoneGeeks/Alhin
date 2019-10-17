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
        if($admin->is_super_admins == 0){
            $permissions=json_decode($admin->permissions);

            return view('pages.admin.info',compact('admin','permissions'));
        }

        return view('pages.admin.info',compact('admin'));
    }

    /**  
    *  edit  admin By id 
    * @pararm int $id admin id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function formEdit($id){
        $admin=User::where('id',$id)->first();

        if($admin->is_super_admins == 0){

            $permissions=json_decode($admin->permissions);

            return view('pages.admin.edit',compact('admin','permissions'));
        }

        return view('pages.admin.edit',compact('admin'));
    }    

    /**  
    * edit  of  admin By id 
    * @pararm int $id admin id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function submitEdit(Request $request,$id){

        $rules=['name'=>'required','email'=>'required','password'=>'nullable|min:8'];
        $message=['name.required'=>'يجب ادخال الاسم  ',
        'email.required'=>'يجب ادخال الايميل ',
        'password.min'=>'يجب ادخال ان يكون الرقم السري اكبر من 8'];


        $request->validate($rules,$message);
    
        if($request->admin == 1){
            $admin=User::where('id',$id)->first();
            $admin->name=$request->name;
            $admin->email=$request->email;
            $request->password == NULL ? :$admin->password=\Hash::make($request->password);
            $admin->is_super_admins=1;
            $admin->created_at=Carbon::now();
            $admin->save();
        
        }else{
            $permissions=[
                'employee'=>['add'=>$request->addemployee,'edit'=>$request->editemployee,'delete'=>$request->deleteemployee],
                'company'=>['add'=>$request->addcompany,'edit'=>$request->editcompany,'delete'=>$request->deletecompany],
                'country'=>['add'=>$request->addcountry,'edit'=>$request->editcountry,'delete'=>$request->deletecountry],
                'religion'=>['add'=>$request->addreligion,'edit'=>$request->editreligion,'delete'=>$request->deletereligion],
                'ads'=>['add'=>$request->addads,'edit'=>$request->editads,'delete'=>$request->deleteads],
                'app_setting'=>['add'=>$request->addapp_setting,'edit'=>$request->editapp_setting,'delete'=>$request->deleteapp_setting],
                'contact'=>['add'=>$request->addcontact,'edit'=>$request->editcontact,'delete'=>$request->deletecontact],
                'nationality'=>['add'=>$request->addnationality,'edit'=>$request->editnationality,'delete'=>$request->deletenationality],
            ];
            $admin=User::where('id',$id)->first();
            $admin->name=$request->name;
            $admin->email=$request->email;
            $request->password == NULL ? : $admin->password=\Hash::make($request->password);
            $admin->is_super_admins=0;
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
        $permissions=[
        'employee'=>['add'=>$request->addemployee,'edit'=>$request->editemployee,'delete'=>$request->deleteemployee],
        'company'=>['add'=>$request->addcompany,'edit'=>$request->editcompany,'delete'=>$request->deletecompany],
        'country'=>['add'=>$request->addcountry,'edit'=>$request->editcountry,'delete'=>$request->deletecountry],
        'religion'=>['add'=>$request->addreligion,'edit'=>$request->editreligion,'delete'=>$request->deletereligion],
        'ads'=>['add'=>$request->addads,'edit'=>$request->editads,'delete'=>$request->deleteads],
        'app_setting'=>['add'=>$request->addapp_setting,'edit'=>$request->editapp_setting,'delete'=>$request->deleteapp_setting],
        'contact'=>['add'=>$request->addcontact,'edit'=>$request->editcontact,'delete'=>$request->deletecontact],
        'nationality'=>['add'=>$request->addnationality,'edit'=>$request->editnationality,'delete'=>$request->deletenationality],
    ];
        $admin=new User;
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=\Hash::make($request->password);
        $admin->is_super_admins=0;
        $admin->permissions=json_encode($permissions);
        $admin->created_at=Carbon::now();
        $admin->save();
    }
    
    if($request->admin == 1){
        \Notify::success('تم اضافة  ادمن جديد بنجاح', '  اضافة ادمن ');
    }else{
        \Notify::success('تم اضافة  مسئول جديد بنجاح', '  اضافة مسئول ');
    }
            return redirect()->to('/admins');
        } 


    

    /**  
    * delete admin By id
    * @pararm int $id admin id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function delete($id){
        $admin=User::where('id',$id)->delete();
        \Notify::success('تم حذف المستخدم بنجاح', '   تم حذف المستخدم ');
        return redirect()->back();
    }    
}