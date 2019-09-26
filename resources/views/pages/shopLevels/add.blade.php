@extends('layout.app',['title'=>'مستوي المتجر'])
@section('content')

@component('components.panel',['subTitle'=>' اضافة مستوي متجر'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('shop.level.add.submit')}}" method="post">
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> الاسم عربي</label>
                    <input type="text" class="form-control" id="InputNameAr"  name="level_ar">
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn"> الاسم اجنبي</label>
                    <input type="text" class="form-control" id="InputNameEn"  name="level_en">
                  </div>

                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" checked  value=1 name="active">
                    <label class="form-check-label" for="exampleCheck1">  مفعل /غير مفعل  </label>
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