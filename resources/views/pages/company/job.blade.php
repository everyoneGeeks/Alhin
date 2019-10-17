@extends('layout.app',['title'=>'الوظائف'])
@section('content')

@component('components.panel',['subTitle'=>' بيانات الوظيفة'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if($job->image == NULL)
                    <h3> لايوجد صوة للوظيفة</h3>
                  @else 
                  <img class="profile-user-img img-fluid img-circle" src="{{asset($job->image)}}" alt="User profile picture">
                  @endif
  
                </div>

                <h3 class="profile-username text-center"></h3>


                <ul class="list-group list-group-unbordered mb-3 text-center">

                  <li class="list-group-item">
                    <span>{{$job->jobName->name_ar}} </span> <b class="float-right"> الاسم الوظيفي  </b>
                  </li>

                  <li class="list-group-item">
                    <span>{{$job->companyName}}</span> <b class="float-right"> اسم الشركة    </b>
                  </li>
                  
                      <li class="list-group-item">
                        <span>{{$job->phone}}</span> <b class="float-right"> الهاتف  </b>
                      </li>


                      <li class="list-group-item">
                          <span>{{$job->email}}</span> <b class="float-right"> الايميل  </b>
                        </li>



                      <li class="list-group-item">
                          <span>{{$job->total_exprience}}</span> <b class="float-right"> عدد سنين الخبرة  </b>
                        </li>


                        <li class="list-group-item">
                          <span>{{$job->salary}}</span> <b class="float-right"> الراتب    </b>
                        </li>


                        <li class="list-group-item">
                          <span>{{$job->view}}</span> <b class="float-right"> عدد المشاهدات     </b>
                        </li>



                        <li class="list-group-item">
                            <span>{{$job->residence_country->country_ar}}</span> <b class="float-right"> مدينة   </b>
                          </li>

                          <li class="list-group-item">
                              <span><a href="/company/info/{{$job->company->id}}"> {{$job->company->name}}  </a></span> <b class="float-right"> اسم الشركة  المالكة للاعلان</b>
                            </li>


                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</span> <b class="float-right"> تاريخ الانضمام </b>
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
      

 @endsection
