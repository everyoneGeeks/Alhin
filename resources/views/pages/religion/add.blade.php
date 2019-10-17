
@extends('layout.app',['title'=>'الديانة'] )
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>'  اضافة  ديانة '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('religion.add.submit')}}" method="post" enctype="multipart/form-data" >
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> اسم الديانة  عربي</label>
                    <input type="text" class="form-control" id="InputNameAr"  name="religion_ar">
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn"> اسم الديانة  اجنبي</label>
                    <input type="text" class="form-control" id="InputNameEn"  name="religion_en">
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