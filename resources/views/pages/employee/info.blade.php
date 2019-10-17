
@extends('layout.app',['title'=>'الموظفين'])
@section('content')
@component('components.panel',['subTitle'=>' بيانات الموظف'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if($Employee->logo == NULL)
                    <h3> لايوجد صوة للموظف</h3>
                  @else 
                  <img class="profile-user-img img-fluid img-circle" src="{{asset($Employee->logo)}}" alt="User profile picture">
                  @endif
  
                </div>

                <h3 class="profile-username text-center">{{$Employee->name}}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <span>{{$Employee->email}}</span> <b class="float-right">الايميل </b>
                  </li>

                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($Employee->created_at)->diffForHumans()}}</span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>

                </ul>
                @if($Employee->is_active == 1)
<a  href="/employee/status/{{$Employee->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a>
@else
<a  href="/employee/status/{{$Employee->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a>
@endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      @endcomponent



      @if(!$Employee->cv == NULL)
      @component('components.panel',['subTitle'=>'السيرة الذاتية  '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <h3 class="profile-username text-center">{{$Employee->cv->job_title}}</h3>


                <ul class="list-group list-group-unbordered mb-3 ">
                  <li class="list-group-item">
                    <span>{{ $Employee->cv->phone}}</span> <b class="float-right"> الهاتف</b>
                  </li>

                  <li class="list-group-item">
                  <span>{{ $Employee->cv->date_of_birth}}</span> <b class="float-right"> تاريخ الميلاد </b>
                  </li>
                  @if($Employee->cv->martial_status == "Single")
                  <li class="list-group-item">
                      <span>   اعزب </span> <b class="float-right">  الحاله الاجتماعية   </b>
                      </li>   
                  @elseif($Employee->cv->martial_status == "Widowed")   
                  <li class="list-group-item">
                    <span>   ارمل </span> <b class="float-right">  الحاله الاجتماعية   </b>
                    </li> 
                  @else
                  <li class="list-group-item">
                    <span>   متزوج </span> <b class="float-right">  الحاله الاجتماعية   </b>
                    </li> 
                  @endif

                  <li class="list-group-item">
                    <span>{{ $Employee->cv->expected_salary}}</span> <b class="float-right"> الراتب المتوقع </b>
                  </li>   
                  <li class="list-group-item">
                      <span>{{ $Employee->cv->residence_country->country_ar}}</span> <b class="float-right"> المدينة </b>
                    </li>   
                    

                    
                    <li class="list-group-item">
                        <span>{{ $Employee->cv->religion->religion_ar}}</span> <b class="float-right"> الديانة </b>
                      </li>  
                      <li class="list-group-item">
                          <span>{{ $Employee->cv->nationality->nationality_ar}}</span> <b class="float-right"> الجنسية </b>
                        </li>                            

                        <li class="list-group-item">
                            <span>{{ $Employee->cv->total_experience}}</span> <b class="float-right"> سنوات الخبرة </b>
                          </li>    


                          <li class="list-group-item">
                              <span>{{ $Employee->cv->note}}</span> <b class="float-right">  الملاحظات </b>
                            </li> 
                            
                            <li class="list-group-item">
                              <span>{{ $Employee->cv->view}}</span> <b class="float-right">  عدد المشاهدات  </b>
                            </li>    
                              


                              
                                <li class="list-group-item">
                                    <span>{{Carbon\Carbon::parse($Employee->created_at)->diffForHumans()}}</span> <b class="float-right">  تاريخ انشاء السيرة الذاتية    </b>
                                  </li>  
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      @endcomponent

      
      @component('components.panel',['subTitle'=>' الاعمال السابقة'])
      @if($Employee->cv->work_experience_job_title == NULL)
      
      @component('components.empty',['section'=>'الاعمال  السابقة']) @endcomponent
      
      @else 

      <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                  <th>الوظيفة  </th>
                  <th>اسم  الشركة</th>
                  <th>سنوات الخبرة</th>
              </tr>
              </thead>
              <tbody>  

              <tr>
      <th> {{$Employee->cv->work_experience_job_title}} </th>
      <th> {{$Employee->cv->work_experience_company_name}} </th>
      <th> {{$Employee->cv->work_experience_experirnce_years}} </th>
              </tr>
      
              </tbody>
              <tfoot>
              <tr>
                  <th>الوظيفة  </th>
                  <th>اسم  الشركة</th>
                  <th>سنوات الخبرة</th>
      
              </tr>
              </tfoot>
              </table>
      
      @endif
      @endcomponent
      

      
@endif        
 @endsection

 @section('javascript')
 <!-- DataTables -->
 <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
 <script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
 <!-- page script -->
 <script>
   $(function () {
 
     $('#example2').DataTable({
         "language": {
             "paginate": {
                 "next": "بعد",
                 "previous" : "قبل"
             }
         },
       "info" : true,
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": true,
       "autoWidth": false
     });
   });
 </script>
 
  @endsection