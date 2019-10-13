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
            'name' => 'required',
            'email' => 'required|email|unique:company,email',
            'password' => 'required|min:6',
            'language' => 'required|in:ar,en',
        ];

        $messages = [
            'name.required' => $this->errorMessage[400][$request->language],
            'email.required' => $this->errorMessage[400][$request->language],
            'email.email' =>$this->errorMessage[400][$request->language],
            'email.unique' => $this->errorMessage[409][$request->language],
            'password.required' => $this->errorMessage[400][$request->language],
            'language.required' => $this->errorMessage[400][$request->language],
            'password.min' => $this->errorMessage[400][$request->language],
            'language.in' => $this->errorMessage[400][$request->language],
        ];
        try {
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first()]);
            }
            #Start logic
            $company = new Company;
            $company->name = $request->name;
            $company->apiToken = \Str::random(64);
            $company->email = $request->email;
            $company->password = Hash::make($request->password);
            $company->language = $request->language;
            $company->save();
            return response()->json(['message' => $this->errorMessage[200][$request->language], 'company' => new companyResource($company)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' =>  $this->errorMessage[404][$request->language]]);
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
        $company = Company::where('apiToken', $request->apiToken)->first();
        $rules = [
            'apiToken' => 'required|exists:company,apiToken',
            'logo' => 'image',
            'password' => 'min:6',
            'language' => 'in:ar,en',
        ];

        $messages = [
            'logo.image' => $this->errorMessage[400][$company->language],
            'email.email' => $this->errorMessage[400][$company->language],
            'email.unique' => $this->errorMessage[409][$company->language],
            'language.in' => $this->errorMessage[400][$company->language],
        ];
        try {

            $rules['email'] = 'email|unique:company,email,' . $company->id;
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first()]);
            }
            #Start logic

            $request->name == null ?: $company->name = $request->name;
            $request->email == null ?: $company->email = $request->email;
            $request->password == null ?: $company->password = Hash::make($request->password);
            $request->language == null ?: $company->language = $request->language;
            $request->logo == null ?: $this->SaveFile($company, 'logo', 'logo', 'images');
            $company->save();

            return response()->json(['message' => $this->errorMessage[200][$company->language], 'company' => new companyResource($company)]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404][$company->language]]);
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
            'email.required' => $this->errorMessage[400]['en'],
            'email.email' => $this->errorMessage[400]['en'],
            'password.required' => $this->errorMessage[400]['en'],
            'password.min' => $this->errorMessage[400]['en'],
        ];
        try {
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' =>  $validator->errors()->first()]);
            }
            #Start logic

            #check Password
            $company = Company::where('email', $request->email)->first();
            $Employee = Employee::where('email', $request->email)->first();
            #company
            if (!$company == null) {
                #password check
                if (!Hash::check($request->password, $company->password)) {
                    return response()->json(['message' => $this->errorMessage[410]['en']]);
                }
                #login Okay
                return response()->json(['message' => $this->errorMessage[200]['en'], 'user' => new companyResource($company)]);
            }

            #Eployee
            if (!$Employee == null) {
                #password check
                if (!Hash::check($request->password, $Employee->password)) {
                    return response()->json(['message' => $this->errorMessage[410]['en']]);
                }
                #login Okay
                return response()->json(['message' => $this->errorMessage[200]['en'], 'user' => new employeeResource($Employee)]);

            }

            return response()->json(['message' => $this->errorMessage[415]['en']]);

            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404]['en']]);
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
                return response()->json(['message' => $validator->errors()->first()]);
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
                return response()->json(['message' => $this->errorMessage[200][$company->language]]);
            }

            if (!$Employee == null) {
                $Employee = Employee::where('email', $request->email)->first();
                $code = 123456;
                $Employee->code = $code;
                $Employee->save();
                #send Email
                $this->sendEmail('email.sendEmail', $request->email, ['code' => $code], 'Alhin ');
                return response()->json(['message' => $this->errorMessage[200][$Employee->language]]);
            }

            return response()->json(['message' => $this->errorMessage[412]['en']]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404]['en']]);
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
            'email.required' => $this->errorMessage[400]['en'],
            'email.email' => $this->errorMessage[405]['en'],
            'code.required' => $this->errorMessage[405]['en'],
        ];
        try {
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first()]);
            }
            #Start logic

            $company = Company::where('email', $request->email)->where('code', $request->code)->first();
            $Employee = Employee::where('email', $request->email)->where('code', $request->code)->first();
            #company

            if (!$company == null) {
                $company->code = null;
                $company->tmpApiToken = \Str::random(64);
                $company->save();
                return response()->json(['message' => $this->errorMessage[200]['en'], 'tmpApiToken' => $company->tmpApiToken]);
            }

            if (!$Employee == null) {
                $Employee->code = null;
                $Employee->tmpApiToken = \Str::random(64);
                $Employee->save();
                return response()->json(['message' => $this->errorMessage[200]['en'], 'tmpApiToken' => $Employee->tmpApiToken]);
            }



            return response()->json(['message' => $this->errorMessage[408]['en']]);
            


       
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404]['en']]);
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
                return response()->json(['message' =>  $validator->errors()->first()]);
            }
            #Start logic
            $company = Company::where('tmpApiToken', $request->tmpToken)->first();
            $Employee = Employee::where('tmpApiToken', $request->tmpToken)->first();
            #company

            if (!$company == null) {
                $company->code = null;
                $company->tmpApiToken = null;
                $company->password = Hash::make($request->newPassword);
                $company->save();
                return response()->json(['message' => $this->errorMessage[200]['en']]);
            }

            if (!$Employee == null) {
                $Employee->code = null;
                $Employee->tmpApiToken = null;
                $Employee->password = Hash::make($request->newPassword);
                $Employee->save();
                return response()->json(['message' => $this->errorMessage[200]['en']]);
            }

            return response()->json(['message' => $this->errorMessage[405]['en']]);
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404]['en']]);
        }
    } // end funcrion

} //end Class
