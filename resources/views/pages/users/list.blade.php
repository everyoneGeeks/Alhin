
@extends('layout.app',['title'=>'المستخدمين' ,'subTitle'=>'ادارة المستخدمين'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>' بيانات المستخدم'])
@if($users->isEmpty())

@component('components.empty',['section'=>'مستخدميين ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الاسم  </th>
            <th>الايميل</th>
            <th> الصور</th>
            <th>الهاتف</th>
            <th>الحالة</th>
            <th>رصيد حساب</th>
        </tr>
        </thead>
        <tbody>  
@foreach($users as $user)
        <tr>
<th> <a href="/user/info/{{$user->id}}">{{$user->name}}</th>
<th> {{$user->email}}</th>
<th><img src="{{asset($user->image)}}" width=50px > </th>
<th> {{$user->phone}}</th>
@if($user->is_active == 1)
<th><a  href="/user/status/{{$user->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
@else
<th><a  href="/user/status/{{$user->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
@endif

<th> $ {{$user->balance}}</th>

          
        </tr>

        @endforeach  
        </tbody>
        <tfoot>
        <tr>
            <th>الاسم  </th>
            <th>الايميل</th>
            <th> الصور</th>
            <th>الهاتف</th>
            <th>الحالة</th>
            <th>رصيد حساب</th>
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