
@extends('layout.app',['title'=>'الموظفين' ,'subTitle'=>'ادارة الموظفين'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' بيانات الموظفين'])
@if($Employees->isEmpty())

@component('components.empty',['section'=>'موظفين ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم  </th>
            <th>الايميل</th>
            <th>الحاله</th>
            <th>تاريخ الانضمام</th>
        </tr>
        </thead>
        <tbody>  
@foreach($Employees as $Employee)
        <tr>
<th> <a href="/employee/info/{{$Employee->id}}">{{$Employee->name}}</th>
<th> {{$Employee->email}}</th>
@if($Employee->is_active == 1)
<th><a  href="/employee/status/{{$Employee->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
@else
<th><a  href="/employee/status/{{$Employee->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
@endif
<th>{{Carbon\Carbon::parse($Employee->created_at)->diffForHumans()}}</th>

          
        </tr>

        @endforeach  
        </tbody>
        <tfoot>
        <tr>
          <th>الاسم  </th>
          <th>الايميل</th>
          <th>الحاله</th>
          <th>تاريخ الانضمام</th>

        </tr>
        </tfoot>
        </table>

@endif
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