 
 @extends('layouts.admin')

 <!--@section('title', 'Add Contact')-->
 
 @section('content') 
 
 <div class="content-wrapper">
 <div class="row">
     <div class="col-md-12 grid-margin stretch-card">
       <div class="card">
         <div class="card-body">
           <p class="card-title">Location of {{"Health faclity name"}}</p>
           <div class="row">
             <div class="col-12">
               <div class="table-responsive">
                 <table id="hospital" class="display expandable-table table-hover table-striped" style="width:100%">
                   <thead>
                     <tr>
                         <th>#</th>
                         <th>States</th>
                         <th>Number of Health Facilities</th>
                         <th>Number of LGAs with Facilities</th>
                     </tr>
                   </thead>
                   @php $kounter = 1;@endphp
                   <tbody>
                       @foreach($hospitals as $hospital)
                       <tr>
                          <td> {{ $kounter++;}}</td>
                          <td> <a href="/facility?state={{$hospital->properties_state_code}}" class="text-decoration-none">{{$hospital->properties_state_name}}</a></td>
                          <td>{{$hospital->facility_number}}</td>
                          <td>{{$hospital->lga_count}}</td>
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
 <script>
   $(document).ready( function () {
       $('#hospital').DataTable();
   } );
 </script>
 @endsection('scripts')
  