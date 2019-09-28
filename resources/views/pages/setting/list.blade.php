
@extends('layout.app',['title'=>'اعدادات التطبيق'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة الاعدادات'])


<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>من نحن   بالعربي </th>
            <th>من نحن   بالانجنبي</th>
            <th> سياسةالتطبيق  بالعربي</th>
            <th> سياسةالتطبيق  بالاجنبي</th>
            <th>تعديل</th>

        </tr>
        </thead>
        <tbody>  
        <tr>
<th> {{$setting->about_us_ar}}</th>
<th> {{$setting->about_us_en}}</th>
<th> {{$setting->terms_conditions_ar}}</th>
<th> {{$setting->terms_conditions_en}}</th>

<th><a href="/app/setting/edit/{{$setting->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>


        </tbody>
        <tfoot>
        <tr>
            <th>من نحن   بالعربي </th>
            <th>من نحن   بالانجنبي</th>
            <th> سياسة  بالعربي</th>
            <th> سياسة  بالاجنبي</th>
            <th>تعديل</th>
        </tr>
        </tfoot>
        </table>



@endcomponent

 @endsection     

 @section('javascript')
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- page script -->
<script>
  $(function () {

    $('#example2').DataTable({
        "language": {
            "paginate": {
                "next": "بعد",
                "previous" : "قبل"
            }
        },
      "info" : true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "autoWidth": false
    });
  });
</script>

 @endsection