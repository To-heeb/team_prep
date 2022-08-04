@extends('layouts.admin')

<!--@section('title', 'Add Contact')-->

@section('content') 

<div class="content-wrapper">
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Facilities with Prep in {{ $state_name->properties_state_name }} State</p>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="hospital" class="display expandable-table table-hover table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Facility name</th>
                      <th>Type</th>
                      <th>LGA</th>
                      <th>Status</th>
                      <th>Category</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  @php $kounter = 1;@endphp
                  <tbody>
                      @foreach($hospitals as $hospital)
                      <tr>
                         
                          <td> {{ $kounter++;}}</td>
                          <td> {{$hospital->properties_name}}</td>
                          <td>{{$hospital->properties_type}}</td>
                          <td>{{$hospital->properties_lga_name}}</td>
                          <td>{{$hospital->properties_functional_status}}</td>
                          <td>{{$hospital->properties_category}}</td>
                          <td>View Location</td>
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
 