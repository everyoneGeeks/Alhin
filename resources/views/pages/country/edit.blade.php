
@extends('layout.app',['title'=>'الدول'] )
@section('content')

@component('components.panel',['subTitle'=>'  تعديل بيانات  الدول '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">
          <form role="form" action="{{route('country.edit.submit',$country->id)}}" method="post" enctype="multipart/form-data">
          @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="InputNameAr"> اسم الدولة عربي</label>
                    <input type="text" class="form-control" id="InputNameAr" value=" {{$country->country_ar}}" name="country_ar">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> اسم  الدولة اجنبي</label>
                    <input type="text" class="form-control" id="InputNameEn" value=" {{$country->country_en}}" name="country_en">
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
              </form>
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