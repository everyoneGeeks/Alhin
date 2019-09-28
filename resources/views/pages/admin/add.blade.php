

@extends('layout.app',['title'=>'المسئولين'])
@section('content')
@component('components.error',['errors'=>$errors ?? NULL]) @endcomponent
@component('components.panel',['subTitle'=>' ادارة المسئولين'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 ">

          <form role="form" action="{{route('admin.add.submit')}}" method="post" enctype="multipart/form-data" >
          @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNameAr"> الاسم </label>
                    <input type="text" class="form-control" id="InputNameAr"  name="name">
                  </div>

                  <div class="form-group">
                    <label for="InputNameEn"> الايميل </label>
                    <input type="text" class="form-control" id="InputNameEn"  name="email">
                  </div>

                  <div class="form-group">
                    <label for="Inputpassword"> الرقم السري </label>
                    <input type="text" class="form-control" id="Inputpassword"  name="password">
                  </div>

                  <div class="form-group">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="admin" value=1   name="admin">
                    <label class="form-check-label" for="exampleCheck1"> ادمن</label>
                  </div>
                  </div>
                  @component('components.checkbox',['title'=>' الموظفين','section'=>'employee'])@endcomponent
                  @component('components.checkbox',['title'=>' الشركات','section'=>'company'])@endcomponent
                  @component('components.checkbox',['title'=>' الدول','section'=>'country'])@endcomponent
                  @component('components.checkbox',['title'=>' الدين','section'=>'religion'])@endcomponent
                  @component('components.checkbox',['title'=>' الاعلانات','section'=>'ads'])@endcomponent
                  @component('components.checkbox',['title'=>' الاعدادات','section'=>'app_setting'])@endcomponent

                  @component('components.checkbox',['title'=>' الشكاوي والاقتراحات','section'=>'contact'])@endcomponent
                  @component('components.checkbox',['title'=>' الجنسية','section'=>'nationality'])@endcomponent
       
                  
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

@section('javascript')
<script>
$('input[type="checkbox"][name="admin"]').change(function() {
     if(this.checked) {
      $("input[type=checkbox]").not('#admin').prop('checked', $(this).prop('checked')).attr("disabled", true);
     }else{
      $("input[type=checkbox]").not('#admin').prop('checked', false).attr("disabled", false);
     }
 });

</script>
@endsection
 @endsection