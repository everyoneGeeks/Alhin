
@extends('layout.app',['title'=>'المندوبين' ,'subTitle'=>'ادارة المندوبين'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
@component('components.panel',['subTitle'=>' بيانات المندوب'])
@if($providers->isEmpty())

@component('components.empty',['section'=>'المندوبين ']) @endcomponent

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
@foreach($providers as $provider)
        <tr>
<th> <a href="/provider/info/{{$provider->id}}">{{$provider->name}}</th>
<th> {{$provider->email}}</th>
<th><img src="{{asset($provider->image)}}" width=50px > </th>
<th> {{$provider->phone}}</th>
@if($provider->is_active == 1)
<th><a  href="/provider/status/{{$provider->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a></th>
@else
<th><a  href="/provider/status/{{$provider->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a></th>
@endif

<th> $ {{$provider->balance}}</th>

          
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