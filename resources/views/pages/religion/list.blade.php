
@extends('layout.app',['title'=>'الديانة'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة الديانات'])
@if($religions->isEmpty())

@component('components.empty',['section'=>'ديانة ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم  الديانة بالعربي </th>
            <th>الاسم  الديانة بالانجنبي</th>
            <th> التاريخ</th>
            <th>تعديل</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>  
@foreach($religions as $religion)
        <tr>
<th> <a href="#">{{$religion->religion_ar}}</a></th>
<th><a href="#"> {{$religion->religion_en}}</a></th>
<th>{{Carbon\Carbon::parse($religion->created_at)->diffForHumans()}}</th>
<th><a href="/religion/edit/{{$religion->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/religion/delete/{{$religion->id}}" class="btn btn-block btn-danger btn-flat"> حذف </a></th>
        </tr>
        @endforeach  
        </tbody>
        <tfoot>
        <tr>
            <th>الاسم  المدينة بالعربي </th>
            <th>الاسم  المدينة بالانجنبي</th>
            <th> التاريخ</th>
            <th>تعديل</th>
            <th>حذف</th>
        </tr>
        </tfoot>
        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/religion/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة ديانة  </a>
</div>
@endslot

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