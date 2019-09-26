
@extends('layout.app',['title'=>'المسئولين'])
@section('content')

@component('components.panel',['subTitle'=>' ادارة المسئولين'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$admin->name}}</span> <b class="float-right">الاسم    </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$admin->email}}</span> <b class="float-right">  الايميل </b>
                  </li>


                </ul>
                @if($admin->is_super_admins == 1)
                <li class="list-group-item">
                <span class="badge badge-success h3">الادمن</span><b class="float-right"> الصلاحية </b>
                  </li>
                @else
                <li class="list-group-item">
                <span class="badge badge-warning h3">مسئول</span> <b class="float-right">  الصلاحية </b>
                  </li>
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