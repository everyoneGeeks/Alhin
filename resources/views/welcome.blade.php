
@extends('layout.app',['title'=>'الاحصائيات' ,'subTitle'=>'ادارة الاحصائيات'])
@section('content')
<div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">الموظفين</span>
                <span class="info-box-number">{{$Employee->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">الشركات</span>
                <span class="info-box-number"> {{ $Company->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-bullhorn"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">الاعلانات</span>
                <span class="info-box-number">{{$Ads->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>


<div class="row">
<div class="col-lg-12" style="
    margin-bottom: 40px;
">
{!! $EmployeeChart->html() !!}
</div>

<div class="col-lg-12">
{!! $CompanyChart->html() !!}
</div>

</div>
 @endsection        

 @section('javascript')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
 {!! Charts::scripts() !!}
{!! $EmployeeChart->script() !!}
{!! $CompanyChart->script() !!}
 @endsection