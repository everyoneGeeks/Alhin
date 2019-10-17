
@extends('layout.app',['title'=>'المسئولين'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' ادارة المسئولين'])
@if($admins->isEmpty())

@component('components.empty',['section'=>'مسئولين ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم  </th>
            <th>الايميل </th>
            <th>النوع</th>
            <th>الافعال</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>  
@foreach($admins as $admin)
        <tr>
<th> <a href="/admin/info/{{$admin->id}}">{{$admin->name}}</a></th>
<th> {{$admin->email}}</th>
@if($admin->is_super_admins == 1)
<th> <span class="badge badge-success h3">الادمن</span></th>
@else
<th><span class="badge badge-warning">مسئول </span>  </a></th>
@endif
<th><a href="/admin/edit/{{$admin->id}}" class="btn btn-block btn-info btn-flat"> تعديل </a></th>
<th><a href="/admin/delete/{{$admin->id}}" class="btn btn-block btn-danger btn-flat"> حذف </a></th>
        </tr>

        @endforeach  
        </tbody>
        <tfoot>
        <tr>
        <th>الاسم  </th>
            <th>الايميل </th>
            <th>النوع</th>
            <th>الافعال</th>
            <th>حذف</th>
        </tr>
        </tfoot>
        </table>

@endif

@slot('footer')
<div class="col-lg-4">

<a  href="/admin/add" class="btn btn-block btn-success btn-lg"> <i class="fa fa-plus" aria-hidden="true"></i> اضافة مسئول  </a>
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