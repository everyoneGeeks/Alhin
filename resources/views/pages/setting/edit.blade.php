
@extends('layout.app',['title'=>'اعدادات التطبيق'] )
@section('content')

@component('components.panel',['subTitle'=>'  تعديل بيانات  الاعدادات '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">
          <form role="form" action="{{route('setting.edit.submit',$setting->id)}}" method="post" enctype="multipart/form-data">
          @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="InputNameAr"> عن التطبيق   عربي</label>
                    <input type="text" class="form-control" id="InputNameAr" value=" {{$setting->about_us_ar}}" name="about_us_ar">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn">   عن التطبيق اجنبي</label>
                    <input type="text" class="form-control" id="InputNameEn" value=" {{$setting->about_us_en}}" name="about_us_en">
                  </div>
                

                  <div class="form-group">
                      <label for="InputNameAr"> سياسة التطبيق  عربي</label>
                      <input type="text" class="form-control" id="InputNameAr" value=" {{$setting->terms_conditions_ar}}" name="terms_conditions_ar">
                    </div>
  
                    <div class="form-group">
                      <label for="InputNameEn">   سياسة التطبيق اجنبي</label>
                      <input type="text" class="form-control" id="InputNameEn" value=" {{$setting->terms_conditions_en}}" name="terms_conditions_en">
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