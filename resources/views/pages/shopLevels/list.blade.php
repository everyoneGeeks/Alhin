
@extends('layout.app',['title'=>'مستوي المتجر'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة مستوي المتاجر'])

@if($shopLevels->isEmpty())

@component('components.empty',['section'=>'مستوي متجر  ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم بالعربي </th>
            <th>الاسم بالانجنبي</th>
            <th>الحالة</th>
            <th>الافعال</th>
        </tr>
        </thead>
        <tbody>  
@foreach($shopLevels as $shopLevel)
        <tr>
<th> <a href="/shop/level/info/{{$shopLevel->id}}">{{$shopLevel->level_ar}}</a></th>
<th><a href="/shop/level/info/{{$shopLevel->id}}"> {{$shopLevel->level_en}}</a></th>
@if($shopLevel->is_active == 1)
<th><a  href="/shop/level/status/{{$shopLevel->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
@else
<th><a  href="/shop/level/status/{{$shopLevel->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
@endif
<th><a href="/shop/level/edit/{{$shopLevel->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
        </tr>

        @endforeach  
        </tbody>
        <tfoot>
        <tr>
        <th>الاسم بالعربي </th>
            <th>الاسم بالانجنبي</th>
            <th>الحالة</th>
            <th>الافعال</th>
        </tr>
        </tfoot>
        </table>

@endif
@slot('footer')
<div class="col-lg-4">

<a  href="/shop/level/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة مستوي متجر  </a>
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