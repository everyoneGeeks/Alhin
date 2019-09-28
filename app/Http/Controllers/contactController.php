<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Notify;
/*
|--------------------------------------------------------------------------
| contactController
|--------------------------------------------------------------------------
| this will handle all contact part (CRUD) 
|
*/
/*

                 _             _   
                | |           | |  
  ___ ___  _ __ | |_ __ _  ___| |_ 
 / __/ _ \| '_ \| __/ _` |/ __| __|
| (_| (_) | | | | || (_| | (__| |_ 
 \___\___/|_| |_|\__\__,_|\___|\__|
                                   
*/
class contactController extends Controller
{
/**  
* show list of contact
* -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
* @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
*/
public function list(){
    $contacts=Contact::get();
    return view('pages.contact.list',compact('contacts'));
    }


    /**  
    * delete contact  By id
    * @pararm int $id contact id 
    * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
    * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
    */
    public function delete($id){
        $contact=Contact::where('id',$id)->delete();

        \Notify::success('تم حذف  الشكوي بنجاح', ' حذف الشكوي  ');
        return redirect()->to('/contact');
        
    }    
}
