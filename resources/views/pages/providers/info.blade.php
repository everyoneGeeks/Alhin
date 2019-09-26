
@extends('layout.app',['title'=>'المندوبين' ,'subTitle'=>'ادارة المندوبين'])

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' بيانات المندوب'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('/dist/img/user8-128x128.jpg')}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$provider->name}}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <span>{{$provider->email}}</span> <b class="float-right">الايميل </b>
                  </li>
                  <li class="list-group-item">
                  <span>{{$provider->phone}}</span> <b class="float-right">الهاتف </b>
                  </li>
                  <li class="list-group-item">
                  <span>{{$provider->created_at}}</span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>
                  <li class="list-group-item">
                  <span>{{$provider->balance}}</span> <b class="float-right">رصيد حساب </b>
                  </li>
                </ul>
                @if($provider->is_active == 1)
                <a  href="/provider/status/{{$provider->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a>
                @else
                <a  href="/provider/status/{{$provider->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a>
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

@if($provider->beautyCenter)

      @component('components.panel',['subTitle'=>'المتجر '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset($provider->beautyCenter->logo)}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$provider->beautyCenter->name}}</h3>


                <ul class="list-group list-group-unbordered mb-3 ">
                  <li class="list-group-item">
                    <span>{{$provider->beautyCenter->about_beauty}}</span> <b class="float-right">عن المتجر </b>
                  </li>

                  <li class="list-group-item">
                  <span>{{$provider->beautyCenter->category->name_ar}}</span> <b class="float-right"> الاقسام </b>
                  </li>


                  <li class="list-group-item">
                  <div class="center" style="
    display: inline-block;
">  <div id="rateYo"></div></div><b class="float-right">التقيم </b>
                  </li>

                </ul>
                @if($provider->beautyCenter->is_active == 1)
                <a  href="/provider/status/beautyCenter/{{$provider->beautyCenter->id}}" class="btn btn-block btn-success btn-sm"> مفعل المتجر</a>
                @else
                <a  href="/provider/status/beautyCenter/{{$provider->beautyCenter->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل المتجر </a>
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



@endif   

 @endsection

 @section('javascript')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
 <script>
 $(function () {
 
 $("#rateYo").rateYo({
  @if($provider->beautyCenter)  
  @if(!$provider->beautyCenter->rate->isEmpty())  
  rating:"{{$code=$provider->beautyCenter->rate()->avg('rate')/$provider->beautyCenter->rate()->count('rate') }}",
          @endif 
          @endif  


   readOnly: true
 });

});
 </script>

 @endsection