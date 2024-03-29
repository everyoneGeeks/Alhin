@extends('layout.app',['title'=>'الشركات'])
@section('content')

@component('components.panel',['subTitle'=>' بيانات الشركات'])
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if($company->logo == NULL)
                    <h3> لايوجد صوة للشركة</h3>
                  @else 
                  <img class="profile-user-img img-fluid img-circle" src="{{asset($company->logo)}}" alt="User profile picture">
                  @endif
  
                </div>

                <h3 class="profile-username text-center">{{$company->name}}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <span>{{$company->email}}</span> <b class="float-right">الايميل </b>
                  </li>

                  <li class="list-group-item">
                  <span>{{Carbon\Carbon::parse($company->created_at)->diffForHumans()}}</span> <b class="float-right"> تاريخ الانضمام </b>
                  </li>

                </ul>
                @if($company->is_active == 1)
<a  href="/company/status/{{$company->id}}" class="btn btn-block btn-success btn-sm"> مفعل</a>
@else
<a  href="/company/status/{{$company->id}}" class="btn btn-block btn-danger btn-flat"> غير مفعل </a>
@endif
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
      
      @component('components.panel',['subTitle'=>' الوظائف'])
      @if($company->job->isEmpty()) 
      @component('components.empty',['section'=>'الاعمال  السابقة']) @endcomponent
      
      @else 
      
      <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                  <th> الوظيفة </th>
                  <th> الهاتف</th>
                  <th> الايميل</th>

              </tr>
              </thead>
              <tbody>  
      @foreach($company->job as $job)
              <tr>
      <th><a href="/company/job/{{ $job->id }}"> {{$job->jobName->name_ar}} </th>

      <th> {{$job->phone}} </th>
      <th> {{$job->email}} </th>


              </tr>
      
              @endforeach  
              </tbody>
              <tfoot>
              <tr>
                <th> الوظيفة </th>
                <th> الهاتف</th>
                <th> الايميل</th>

      
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
       "autoWidth": true
     });
   });
 </script>
 
  @endsection