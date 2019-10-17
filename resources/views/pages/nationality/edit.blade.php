
@extends('layout.app',['title'=>'الجنسية'] )
@section('content')

@component('components.panel',['subTitle'=>'  تعديل بيانات  الجنسية '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">
          <form role="form" action="{{route('nationality.edit.submit',$nationality->id)}}" method="post" enctype="multipart/form-data">
          @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="InputNameAr"> اسم الجنسية عربي</label>
                    <input type="text" class="form-control" id="InputNameAr" value=" {{$nationality->nationality_ar}}" name="nationality_ar">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> اسم  الجنسية اجنبي</label>
                    <input type="text" class="form-control" id="InputNameEn" value=" {{$nationality->nationality_en}}" name="nationality_en">
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