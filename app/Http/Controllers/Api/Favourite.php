<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Employee;
use App\favouriteCompany;
use App\favouriteEmployee;
use App\Http\Controllers\Controller;
use App\Http\Resources\favCampany;
use App\Http\Resources\favEmployee;
use Illuminate\Http\Request;

class Favourite extends Controller
{
    /**
     * This api will to get all favourite employee for company
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function favourite_company(Request $request)
    {
        $rules = [
            'apiToken' => 'required',
        ];

        $messages = [
            'apiToken.required' => '400',
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
            }
            #Start logic
            $company = Company::where('apiToken', $request->apiToken)->first();
            if (!$company == null) {
                $request->language = $company->language;
                #check if code is right
                $favEmployee = favouriteCompany::where('company_id', $company->id)
                    ->with(['employee' => function ($q) {
                        $q->with('cv');
                    }])->get();

                if ($favEmployee->isEmpty()) {
                    return response()->json(['status' => 204]);
                }
                return response()->json(['status' => 200, 'favourite' => favEmployee::collection($favEmployee)]);
            }

            $Employee = Employee::where('apiToken', $request->apiToken)->first();
            if (!$Employee == null) {
                $request->language = $Employee->language;
                #check if code is right
                $favouriteEmployee = favouriteEmployee::where('employee_id', $Employee->id)
                    ->with(['job'=>function($q){
                        $q->with('company');
                    }])->get();

                if ($favouriteEmployee->isEmpty()) {
                    return response()->json(['status' => 204]);
                }
   
                return response()->json(['status' => 200, 'favourite' => favCampany::collection($favouriteEmployee)]);
            }
            return response()->json(['status' => 405]);
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
        }
    } // end funcrion

    /**
     * This api will to add  favourite employee for company
     * -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
     * @param $request Illuminate\Http\Request;
     * @author ಠ_ಠ Abdelrahman Mohamed <abdomohamed00001@gmail.com>
     */
    public function MakeFavourite(Request $request)
    {
        $rules = [
            'apiToken' => 'required|exists:company,apiToken',
            'employee_id' => 'exists:employee,id',
            'job_id' => 'exists:job,id',
        ];

        $messages = [
            'apiToken.required' => '400',
            'apiToken.exists' => '400',
            'employee_id.required' => '400',
            'employee_id.exists' => '400',
            'job_id.required' => '400',
            'job_id.exists' => '400',
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['status' => (int) $validator->errors()->first()]);
            }
            #Start logic
            if($request->employee_id){

            $company = Company::where('apiToken', $request->apiToken)->first();
            $request->language = $company->language;
            #check if code is right
            $favEmployee = favouriteCompany::where('company_id', $company->id)->where('employee_id', $request->employee_id)->first();

            if ($favEmployee == null) {
                $favEmployee = new favouriteEmployee;
                $favEmployee->company_id = $company->id;
                $favEmployee->employee_id = $request->employee_id;
                $favEmployee->created_at = \Carbon\Carbon::now();
                $favEmployee->save();
            } else {
                #unfavouiret
                $favEmployee->delete();
            }

            return response()->json(['status' => 200]);
        }

        if($request->job_id){
            $Employee = Employee::where('apiToken', $request->apiToken)->first();
            $request->language = $Employee->language;
            #check if code is right
            $favouriteEmployee = favouriteEmployee::where('job_id', $request->job_id)->where('employee_id', $Employee->id)->first();

            if ($favouriteEmployee == null) {
                $favouriteEmployee = new favouriteEmployee;
                $favouriteEmployee->job_id = $request->job_id;
                $favouriteEmployee->employee_id = $Employee->id;
                $favouriteEmployee->created_at = \Carbon\Carbon::now();
                $favouriteEmployee->save();
            } else {
                #unfavouiret
                $favouriteEmployee->delete();
            }

            return response()->json(['status' => 200]);
        }
        return response()->json(['status' => 204]);         
            #end logic
        } catch (Exception $e) {
            return response()->json(['status' => 404]);
        }
    } // end funcrion
}
