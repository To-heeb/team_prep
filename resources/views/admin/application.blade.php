 
 @extends('layouts.admin')

 <!--@section('title', 'Add Contact')-->
 
 @section('content') 
 <style>
  .required {
        color: red;
  }
 </style>
 <div class="content-wrapper">
 <div class="row">
    <div class="offset-md-2 col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">PrEP Applicant form</h4>
            {{-- <p class="card-description">
              Basic form layout
            </p> --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
            @if (session('status') == 'success')
                {{-- <div class="alert alert-success">Prep Applicant successfully registered</div> --}}
                <input type="hidden" name="status" value="{{ session('status') }}" id="status">
            @endif 
            @if (session('status') == 'failed')
                {{-- <div class="alert alert-danger">Something went wrong, Please try again later.</div> --}}
                <input type="hidden" name="status" value="{{ session('status') }}" id="status">
            @endif 
            <form class="forms-sample" action="/admin/prepformsubmission" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleInputUsername1">First Name <span class="required">*</span></label>
                <input type="text" class="form-control" id="" name="firstname" placeholder="Firstname" required>
                @error('firstname')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                  @enderror 
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Middle Name</label>
                <input type="text" class="form-control" id="" name="middlename" placeholder="Middlename">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Last Name <span class="required">*</span></label>
                <input type="text" class="form-control" id="" name="lastname" placeholder="Lastname" required>
                @error('lastname')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                  @enderror 
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="" name="email" placeholder="Email address">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Next of Kin</label>
                <input type="text" class="form-control" id="" name="next_of_kin" placeholder="Next of kin">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Name of Guardian/Sponsor/Parent</label>
                <input type="text" class="form-control" id="" name="sponsor" placeholder="Name of Guardian/Sponsor/Parent">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Age <span class="required">*</span></label>
                <input type="number" min='1' max='120' class="form-control" id="" name="age" placeholder="Age" required>
                @error('age')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                  @enderror 
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Appointment Date <span class="required">*</span></label>
                <input type="date" class="form-control" id="" name="appointment_date" placeholder="" required>
                @error('appointment_date')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                  @enderror 
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Residential State <span class="required">*</span></label>
                <select type="text" class="form-control" id="state" name="residential_state" required>
                    <option value="">Select State</option>
                    @foreach($states as $state);
                      <option value="{{ $state->code }}">{{ $state->name }}</option>
                    @endforeach
                </select>
                @error('residential_state')
                   <p class="text-danger text-xs mt-1">{{$message}}</p>
                 @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Residential Local goverment <span class="required">*</span></label>
                <select type="text" class="form-control" id="localgovresidence" name="residential_lga" required>
                  <option value="">Select Local goverment</option>
              </select>
              @error('residential_lga')
                      <p class="text-danger text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
              <div class="form-check form-check-flat form-check-primary">
                {{-- <label class="form-check-label">
                  <input type="checkbox" class="form-check-input">
                  Remember me
                </label> --}}
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button type="reset" class="btn btn-light">Clear Form</button>
            </form>
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
        
    //load lga for state residence
    $("#state").on("change",function () {
      $value = $(this).val();
      $.ajax({
            type: "POST",
            url: "/admin/getlgas",
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            dataType: 'json',
            data: "state_code=" + $value,
        }).done(function(results) {
            $('#localgovresidence').empty();
            for (i = 0; i < results.length; i++) {
                var name = results[i]['name'];
                var value = results[i]['code'];
                $('#localgovresidence').append("<option value='" + name + "'>" + name + "</option>");
            }
        });
    })


    var status = document.querySelector('#status').value;
    console.log(status);
    if (status == 'success') {
        Swal.fire({
          icon: 'success',
          title: 'Prep Applicant has been successfully saved',
          showConfirmButton: false,
          timer: 2000
        }).then(() => {
          location.reload();
        })
    }

    if (status == 'failed') {
        Swal.fire({
          icon: 'error',
          title: 'Something went wrong, please try again later',
          showConfirmButton: false,
          timer: 2000
        }).then(() => {
          location.reload();
        })
    }

   });
 </script>
 @endsection('scripts')
  