
@extends('layout.app',['title'=>'الاقسام'] )
@section('content')

@component('components.panel',['subTitle'=>'  تعديل بيانات  القسم '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">
<div class="text-center">

<img src="{{asset($category->logo)}}" width=150px>
</div>
          <form role="form" action="{{route('category.edit.submit',$category->id)}}" method="post" enctype="multipart/form-data">
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> الاسم عربي</label>
                    <input type="text" class="form-control" id="InputNameAr" value=" {{$category->name_ar}}" name="name_ar">
                  </div>
                  <div class="form-group">
                    <label for="InputNameEn"> الاسم اجنبي</label>
                    <input type="text" class="form-control" id="InputNameEn" value=" {{$category->name_en}}" name="name_en">
                  </div>
                  <div class="form-group">

                    <label for="InputFile"> صوره القسم</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="InputFile" name="logo">
                        <label class="custom-file-label" for="InputFile"> صوره القسم</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                      @if($category->is_active == 1)
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" checked value="1" name="active">
                    @else
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1" name="active">
                    @endif
                    <label class="form-check-label" for="exampleCheck1">  مفعل </label>
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