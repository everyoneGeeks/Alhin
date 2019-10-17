<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Employee;
use App\favouriteCompany;
use App\favouriteEmployee;
use App\Http\Controllers\Controller;
use App\Http\Resources\favCampany;
use App\Http\Resources\favEmployee;
use App\Http\Resources\favObject;

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
            'apiToken.required' => $this->errorMessage[400]['en'],
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' =>  $validator->errors()->first()]);
            }
            #Start logic
            $company = Company::where('apiToken', $request->apiToken)->first();

            if (!$company == null) {
                $request->language = $company->language;
                #favEmployee
                $favEmployee = favouriteCompany::where('company_id',$company->id)->with('cv')->with('job')->with('company')->get();
        
                if ($favEmployee->isEmpty()) {
                    return response()->json(['message' => $this->errorMessage[204]['en']]);
                }
                return response()->json(['message' => $this->errorMessage[200]['en'], 'favourite' => favObject::collection($favEmployee)]);
            }

            $Employee = Employee::where('apiToken', $request->apiToken)->first();
            if (!$Employee == null) {

                $request->language = $Employee->language;
                #check if code is right
                $favouriteEmployee = favouriteEmployee::where('employee_id', $Employee->id)->with('cv')->with('job')->with('employee')->get();

                if ($favouriteEmployee->isEmpty()) {
                    return response()->json(['message' => $this->errorMessage[204]['en']]);
                }
   
                return response()->json(['message' => $this->errorMessage[200]['en'], 'favourite' => favEmployee::collection($favouriteEmployee)]);
            }
            return response()->json(['message' => $this->errorMessage[405]['en']]);
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404]['en']]);
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
            'apiToken' => 'required',
            'cv_id' => 'exists:CV,id',
            'job_id' => 'exists:job,id',
        ];

        $messages = [
            'apiToken.required' => $this->errorMessage[400]['en'],
            'cv_id.exists' => $this->errorMessage[405]['en'],
            'job_id.required' => $this->errorMessage[400]['en'],
            'job_id.exists' => $this->errorMessage[405]['en'],
        ];
        try {
            $validator = \Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()->first()]);
            }
            #Start Company 
            $company = Company::where('apiToken', $request->apiToken)->first();
            if(!$company == NULL ){
            $request->language = $company->language;
            #check if code is right
            $favCompany = favouriteCompany::where('company_id', $company->id)->where('cv_id', $request->cv_id)->orWhere('job_id', $request->job_id)->first();

            if ($favCompany == null) {
                $favCompany = new favouriteCompany;
                $favCompany->company_id = $company->id;
                $request->cv_id == NULL  ? $favCompany->cv_id =NULL :$favCompany->cv_id = $request->cv_id;
                $request->job_id == NULL  ?$favCompany->job_id =NULL :$favCompany->job_id = $request->job_id;
                $favCompany->created_at = \Carbon\Carbon::now();
                $favCompany->save();
                return response()->json(['message' => $this->errorMessage[200]['en'],'isFave'=>'fav']);
            } else {
                #unfavouiret
                $favCompany->delete();
                return response()->json(['message' => $this->errorMessage[200]['en'],'isFave'=>'unfav']);
            }


        }



        $employee = Employee::where('apiToken', $request->apiToken)->first();
        if(!$employee == NULL ){
        $request->language = $employee->language;
        #check if code is right
        $favEmployee = favouriteEmployee::where('employee_id', $employee->id)->where('cv_id', $request->cv_id)->orWhere('job_id', $request->job_id)->first();

        if ($favEmployee == null) {
            $favEmployee = new favouriteEmployee;
            $favEmployee->employee_id = $employee->id;
            $request->cv_id == NULL  ? $favEmployee->cv_id =NULL :$favEmployee->cv_id = $request->cv_id;
            $request->job_id == NULL  ?$favEmployee->job_id =NULL :$favEmployee->job_id = $request->job_id;
            $favEmployee->created_at = \Carbon\Carbon::now();
            $favEmployee->save();
            return response()->json(['message' => $this->errorMessage[200]['en'],'isFave'=>'fav']);
        } else {
            #unfavouiret
            $favEmployee->delete();
            return response()->json(['message' => $this->errorMessage[200]['en'],'isFave'=>'unfav']);
        }


    }       

        return response()->json(['message' => $this->errorMessage[204]['en']]);         
            #end logic
        } catch (Exception $e) {
            return response()->json(['message' => $this->errorMessage[404]['en']]);
        }
    } // end funcrion
}
