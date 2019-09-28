<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;
use App\Ads;

use Charts;
/*
|--------------------------------------------------------------------------
| dashBoardController
|--------------------------------------------------------------------------
| this will handle all dashBoardController part (CRUD) 
|
*/
/**
     _           _     ____                      _ 
    | |         | |   |  _ \                    | |
  __| | __ _ ___| |__ | |_) | ___   __ _ _ __ __| |
 / _` |/ _` / __| '_ \|  _ < / _ \ / _` | '__/ _` |
| (_| | (_| \__ \ | | | |_) | (_) | (_| | | | (_| |
 \__,_|\__,_|___/_| |_|____/ \___/ \__,_|_|  \__,_|
                                                   
 */
class dashBoardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Employee=Employee::get();
        $Company=Company::get();
        $Ads=Ads::get();


        $EmployeeChart = Charts::database($Employee, 'line', 'highcharts')
			      ->title("التسجيل الشهر للموظفيين")
			      ->elementLabel("اجمالي الموظفيين ")
			      ->dimensions(500, 500)
			      ->responsive(true)
                  ->groupByMonth(date('Y'), true);
                  
                  $CompanyChart = Charts::database($Company, 'line', 'highcharts')
			      ->title("التسجيل الشهر للشركات   ")
			      ->elementLabel("اجمالي للشركات ")
			      ->dimensions(500, 500)
			      ->responsive(true)
			      ->groupByMonth(date('Y'), true);


        return view('welcome',compact('CompanyChart','EmployeeChart','Employee','Company','Ads'));
    }

}
