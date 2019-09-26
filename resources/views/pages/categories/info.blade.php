
@extends('layout.app',['title'=>'الاقسام'] )
@section('content')

@component('components.panel',['subTitle'=>'  بيانات القسم '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset($category->logo)}}" alt="User profile picture">
                </div>




                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$category->name_ar}}</span> <b class="float-right">الاسم  العربي  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$category->name_en}}</span> <b class="float-right">الاسم  بالاجنبي  </b>
                  </li>

                  <li class="list-group-item">
                  <span>{{$category->created_at}}</span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>
                </ul>
                @if($category->is_active == 1)
                <th><a  href="/category/status/{{$category->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
                @else
                <th><a  href="/category/status/{{$category->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
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


 @endsection