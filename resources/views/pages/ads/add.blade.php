
@extends('layout.app',['title'=>'الاعلان'] )
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>'  اضافة  اعلان '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('ads.add.submit')}}" method="post" enctype="multipart/form-data" >
          @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="InputNameAr">   رابط الاعلان</label>
                        <input type="text" class="form-control" id="InputNameAr"  name="url">
                      </div>
    
                      <div class="form-group">
                        <label for="InputNameEn">    صورة الاعلان</label>
                        <input type="file" class="form-control" id="InputNameEn" name="image" >
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