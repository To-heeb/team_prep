<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ViTAccess - Homepage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('landing/img/vitacess-logo.png') }}" rel="shortcut icon" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('landing/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('landing/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('landing/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('landing/css/style.css') }}" rel="stylesheet">

    {{-- FOnt awesome --}}
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/select.dataTables.min.css') }}">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <!-- Spinner Start -->
    {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> --}}
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light fixed-top shadow py-lg-0 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="" class="navbar-brand d-block d-lg-none">
            <h1 class="text-primary fw-bold m-0">ViTAccess</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between py-4 py-lg-0" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="/" class="nav-item nav-link">About</a>
                {{-- <a href="#skill" class="nav-item nav-link">Skills</a>
                <a href="#service" class="nav-item nav-link">Services</a> --}}
            </div>
            <a href="/" class="navbar-brand bg-secondary py-3 px-4 mx-3 d-none d-lg-block">
                <h1 class="text-primary fw-bold m-0">ViTAccess</h1>
            </a>
            <div class="navbar-nav me-auto py-0">
                {{-- <a href="#project" class="nav-item nav-link">Projects</a> --}}
                <a href="/" class="nav-item nav-link">Team</a>
                {{-- <a href="#testimonial" class="nav-item nav-link">Testimonial</a> --}}
                <a href="/" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


   
    <!-- Header Start -->

    <div class="container-fluid bg-light mt-0" id="home">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 py-6 text-center">
                    
                    <h1 class="display-3 mb-3">ViTAccess</h1>
                    <h3><i>Select State</i></h3>

                </div>
                {{-- <div class="col-lg-6">
                    <img class="img-fluid" src="{{ asset('landing/img/profile.png') }}" alt="">
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Header End -->


    {{-- Data table --}}
        <div class="content-wrapper mb-5">
         <div class="row">
            <div class="offset-md-1 col-md-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">States</h3>
                  <div class="row mt-4">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="hospital" class="table display expandable-table table-hover table-striped" style="width:100%">
                          <thead class="bg-primary text-white">
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
                                 <td> <a href="/hospitals?state={{$hospital->properties_state_code}}" class="text-decoration-none">{{$hospital->properties_state_name}}</a></td>
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
    {{-- End Data Table --}}

    <!-- Copyright Start -->
    <div class="container-fluid bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; Copyright {{date('Y')}} <a class="border-bottom text-secondary" href="#">Team VitA-ccess</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    {{-- Designed By <a class="border-bottom text-secondary" href="https://htmlcodex.com">HTML Codex</a>
                    <br>Distributed By: <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landing/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('landing/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('landing/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('landing/lib/typed/typed.min.js') }}"></script>
    <script src="{{ asset('landing/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('landing/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landing/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.select.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('landing/js/main.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#hospital').DataTable();
        } );
      </script>
</body>

</html>