 
 @extends('layouts.admin')

 <!--@section('title', 'Add Contact')-->
 
 @section('content') 
 <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
 <div class="content-wrapper">
 <div class="row">
     <div class="col-md-12 grid-margin stretch-card">
       <div class="card">
         <div class="card-body">
           <p class="card-title">PrEP Applicants</p>
           <div class="row">
             <div class="col-12">
               <div class="table-responsive">
                 <table id="hospital" class="display expandable-table table-hover table-striped" style="width:100%">
                   <thead>
                     <tr>
                         <th>#</th>
                         <th>Full name</th>
                         <th>Age</th>
                         <th>Residence State</th>
                         <th>Residence Lga</th>
                         <th>Appointment date</th>
                     </tr>
                   </thead>
                   @php $kounter = 1;@endphp
                   <tbody>
                       @foreach($applicants as $applicant)
                       <tr>
                          <td> {{ $kounter++;}}</td>
                          <td> {{$applicant->lastname}}  {{$applicant->firstname}} </td>
                          <td> {{$applicant->age}}</td>
                          <td> {{$applicant->name}}</td>
                          <td> {{$applicant->residential_lga}}</td>
                          <td> {{ date('jS F Y', strtotime($applicant->appointment_date))}}</td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
               </div>
             </div>
           </div>
           </div>
         </div>
 
         
       </div>
     </div>
 </div>
 <!-- content-wrapper ends -->
 @endsection('content') 
 
 @section('script')
 <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
 <script>
   $(document).ready( function () {
       $('#hospital').DataTable({
          dom: 'Bfrtip',
          buttons: [
              'csv', 'excel', 'pdf'
          ]
       });
   } );
 </script>
 @endsection('scripts')
  