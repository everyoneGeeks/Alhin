<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Resources\company as companyResource;
use App\Http\Resources\employee as employeeResource;
use Hash;
use Illuminate\Http\Request;
use Validator;

/*
|--------------------------------------------------------------------------
| companyControllers
|--------------------------------------------------------------------------
| this will handle all comapy part
| R
 */
/**
_____
/ ____|
| |     ___  _ __ ___  _ __   __ _ _ __  _   _
| |    / _ \| '_ ` _ \| '_ \ / _` | '_ \| | | |
| |___| (_) | | | | | | |_) | (_| | | | | |_| |
\_____\___/|_| |_| |_| .__/ \__,_|_| |_|\__, |
| |                 __/ |
|_|                |___/
 */
class companyControllers extends Controller
{

/**
 * This api will be used to register new company
 * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
 * @param $request Illuminate\Http\Request;
 * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
 */
    public function register(Request $request)
    {
        $rules = [
            //   'logo'=>'required|image',
            'name' => 'required',
            'email' => 'required|email|unique:company,email',
            'password' => 'required|min:6',
            'language' => 'required|in:ar,en',
        ];

        $messages = [
            //    'logo.required'=>'400',
            //   'logo.image'=>'400',
            'name.required' => '400',
            'email.required' => '400',
            'email.email' => '400',
            'email.unique' => '409',
            'password.required' => '400',
            'language.required' => '400',
            'password.min' => '400',
            'language.in' => '400',
        ];
        try {
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
            }
            #Start logic
            $company = new Company;
            $company->name = $request->name;
            $company->apiToken = \Str::random(64);
            $company->email = $request->email;
            $company->password = Hash::make($request->password);
            $company->language = $request->language;
            //$this->SaveFile($company,'logo','logo','images');
            $company->save();
            return response()->json(['status' => 200, 'company' => new companyResource($company)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
        }
    } // end funcrion

/**
 * This api will be used to update  company
 * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
 * @param $request Illuminate\Http\Request;
 * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
 */
    public function update(Request $request)
    {
        $rules = [
            'apiToken' => 'required|exists:company,apiToken',
            'logo' => 'image',
            'password' => 'min:6',
            'language' => 'in:ar,en',
        ];

        $messages = [
            'logo.image' => '400',
            'email.email' => '400',
            'email.unique' => '409',
            'language.in' => '400',
        ];
        try {
            $company = Company::where('apiToken', $request->apiToken)->first();
            $rules['email'] = 'email|unique:company,email,' . $company->id;
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
            }
            #Start logic

            $request->name == null ?: $company->name = $request->name;
            $request->email == null ?: $company->email = $request->email;
            $request->password == null ?: $company->password = Hash::make($request->password);
            $request->language == null ?: $company->language = $request->language;
            $request->logo == null ?: $this->SaveFile($company, 'logo', 'logo', 'images');
            $company->save();

            return response()->json(['status' => 200, 'company' => new companyResource($company)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
        }
    } // end funcrion

/**
 * This api will be used to login   comapny or Employee with (password & email)
 * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
 * @param $request Illuminate\Http\Request;
 * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
 */
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6',

        ];

        $messages = [
            'email.required' => '400',
            'email.email' => '400',
            'password.required' => '400',
            'password.min' => '400',
        ];
        try {
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
            }
            #Start logic

            #check Password
            $company = Company::where('email', $request->email)->first();
            $Employee = Employee::where('email', $request->email)->first();
            #company
            if (!$company == null) {
                #password check
                if (!Hash::check($request->password, $company->password)) {
                    return response()->json(['status' => 410]);
                }
                #login Okay
                return response()->json(['status' => 200, 'user' => new companyResource($company)]);
            }

            #Eployee
            if (!$Employee == null) {
                #password check
                if (!Hash::check($request->password, $Employee->password)) {
                    return response()->json(['status' => 410]);
                }
                #login Okay
                return response()->json(['status' => 200, 'user' => new employeeResource($Employee)]);

            }

            return response()->json(['status' => 415]);

            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
        }
    } // end funcrion

/**
 * This api will be used to forget Password comapny or Employee.
 * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
 * @param $request Illuminate\Http\Request;
 * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
 */
    public function forgetPassword(Request $request)
    {
        $rules = [
            'email' => 'required|email',
        ];

        $messages = [
            'email.required' => '400',
            'email.email' => '405',

        ];
        try {
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
            }
            #Start logic

            $company = Company::where('email', $request->email)->first();
            $Employee = Employee::where('email', $request->email)->first();
            #company

            if (!$company == null) {
                $company = Company::where('email', $request->email)->first();
                $code = 123456;
                $company->code = $code;
                $company->save();
                #send Email
                $this->sendEmail('email.sendEmail', $request->email, ['code' => $code], 'Alhin ');
                return response()->json(['status' => 200]);
            }

            if (!$Employee == null) {
                $Employee = Employee::where('email', $request->email)->first();
                $code = 123456;
                $Employee->code = $code;
                $Employee->save();
                #send Email
                $this->sendEmail('email.sendEmail', $request->email, ['code' => $code], 'Alhin ');
                return response()->json(['status' => 200]);
            }

            return response()->json(['status' => 412]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
        }
    } // end funcrion

/**
 * This api will be used in 1 cases to validate the comapny or Employee. verification code.
 * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
 * @param $request Illuminate\Http\Request;
 * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
 */
    public function validateCode(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'code' => 'required',
        ];

        $messages = [
            'email.required' => '400',
            'email.email' => '405',
            'code.required' => '405',
        ];
        try {
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
            }
            #Start logic

            $company = Company::where('email', $request->email)->where('code', $request->code)->first();
            $Employee = Employee::where('email', $request->email)->where('code', $request->code)->first();
            #company

            if (!$company == null) {
                $company->code = null;
                $company->tmpApiToken = \Str::random(64);
                $company->save();
                return response()->json(['status' => 200, 'tmpApiToken' => $company->tmpApiToken]);
            }

            if (!$Employee == null) {
                $Employee->code = null;
                $Employee->tmpApiToken = \Str::random(64);
                $Employee->save();
                return response()->json(['status' => 200, 'tmpApiToken' => $Employee->tmpApiToken]);
            }



            return response()->json(['status' => 408]);
            


       
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
        }
    } // end funcrion

/**
 * This api will be used to change the password of the comapny or Employee. if his account is exists.
 * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
 * @param $request Illuminate\Http\Request;
 * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
 */
    public function changePassword(Request $request)
    {
        $rules = [
            'tmpToken' => 'required',
            'newPassword' => 'required|min:6',
        ];

        $messages = [
            'tmpToken.required' => '400',
            'newPassword.required' => '400',
            'newPassword.min' => '400',
        ];
        try {
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
            }
            #Start logic
            $company = Company::where('tmpApiToken', $request->tmpApiToken)->first();
            $Employee = Employee::where('tmpApiToken', $request->tmpApiToken)->first();
            #company

            if (!$company == null) {
                $company->code = null;
                $company->tmpApiToken = null;
                $company->password = Hash::make($request->newPassword);
                $company->save();
                return response()->json(['status' => 200]);
            }

            if (!$Employee == null) {
                $Employee->code = null;
                $Employee->tmpApiToken = null;
                $Employee->password = Hash::make($request->newPassword);
                $Employee->save();
                return response()->json(['status' => 200]);
            }

            return response()->json(['status' => 405]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
        }
    } // end funcrion

} //end Class
