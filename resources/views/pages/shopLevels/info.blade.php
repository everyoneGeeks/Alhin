@extends('layout.app',['title'=>'مستوي المتجر'])
@section('content')

@component('components.panel',['subTitle'=>' ادارة مستوي المتاجر'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

                <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                    <span>{{$shopLevel->level_ar}}</span> <b class="float-right">الاسم  العربي  </b>
                  </li>
                  <li class="list-group-item">
                    <span>{{$shopLevel->level_en}}</span> <b class="float-right">الاسم  بالاجنبي  </b>
                  </li>

                  <li class="list-group-item">
                  <span>{{$shopLevel->created_at}}</span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>
                </ul>
                @if($shopLevel->is_active == 1)
                <a  href="/shop/level/status/{{$shopLevel->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a>
                @else
                <a  href="/shop/level/status/{{$shopLevel->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a>
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