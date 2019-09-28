
@extends('layout.app',['title'=>'الشكاوي والاقتراحات' ,'subTitle'=>'ادارة الشكاوي والاقتراحات'])
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')

@component('components.panel',['subTitle'=>'  الرسائل'])
@if($contacts->isEmpty())

@component('components.empty',['section'=>'رساله ']) @endcomponent

@else 

<table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>الايميل</th>
            <th>الرساله</th>
            <th>تاريخ الانضمام</th>
            <th> حذف</th>
        </tr>
        </thead>
        <tbody>  
@foreach($contacts as $contact)
        <tr>
<th> {{$contact->email}}</th>
<th> {{$contact->message}}</th>

<th>{{Carbon\Carbon::parse($contact->created_at)->diffForHumans()}}</th>
<th><a  href="/contact/delete/{{$contact->id}}" class="btn btn-block btn-danger btn-flat"> حذف  </a></th>

          
        </tr>

        @endforeach  
        </tbody>
        <tfoot>
        <tr>
            <th>الايميل</th>
            <th>الرساله</th>
            <th>تاريخ الانضمام</th>
            <th> حذف</th>

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