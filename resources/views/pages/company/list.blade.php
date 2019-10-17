
@extends('layout.app',['title'=>'الشركات' ,'subTitle'=>'ادارة الشركات'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' بيانات الشركات'])
@if($companies->isEmpty())

@component('components.empty',['section'=>'شركات ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم  </th>
            <th>الايميل</th>
            <th>الحاله</th>
            <th>تاريخ الانضمام</th>
            <th>حذف  </th>
        </tr>
        </thead>
        <tbody>  
@foreach($companies as $company)
        <tr>
<th> <a href="/company/info/{{$company->id}}">{{$company->name}}</th>
<th> {{$company->email}}</th>
@if($company->is_active == 1)
<th><a  href="/company/status/{{$company->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
@else
<th><a  href="/company/status/{{$company->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
@endif
<th>{{Carbon\Carbon::parse($company->created_at)->diffForHumans()}}</th>
<th><a  href="/company/delete/{{$company->id}}" class="btn btn-block btn-danger btn-flat">  حذف </a></th>
          
        </tr>

        @endforeach  
        </tbody>
        <tfoot>
        <tr>
          <th>الاسم  </th>
          <th>الايميل</th>
          <th>الحاله</th>
          <th>تاريخ الانضمام</th>
          <th>حذف  </th>
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