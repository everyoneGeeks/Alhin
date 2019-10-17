
@extends('layout.app',['title'=>'الاعلان'] )
@section('content')

@component('components.panel',['subTitle'=>'  تعديل بيانات  الاعلان '])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">
          <form role="form" action="{{route('ads.edit.submit',$Ads->id)}}" method="post" enctype="multipart/form-data">
          @csrf
                <div class="card-body">
                     <div class="text-center">
                        @if($Ads->image == NULL)
                          <h3> لايوجد صوة للاعلان</h3>
                        @else 
                        <img class="profile-user-img img-fluid img-circle" src="{{asset($Ads->image)}}" alt="User profile picture">
                        @endif
                     </div>
                  <div class="form-group">
                    <label for="InputNameAr">   رابط الاعلان</label>
                    <input type="text" class="form-control" id="InputNameAr" value=" {{$Ads->url}}" name="url">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn">    صورة الاعلان</label>
                    <input type="file" class="form-control" id="InputNameEn" name="image" >
                  </div>
                
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