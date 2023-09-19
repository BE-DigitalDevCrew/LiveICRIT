@extends('layouts.stafflayout')
@section('content')
<div class="main-content position-relative max-height-vh-100 h-100">
  <!-- Navbar -->
 
  <!-- End Navbar -->
  <div class="card shadow-lg mx-4 card-profile-bottom">
    
  </div>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
             
              <a href="{{route('staff.addincidencereport')}}" class="btn btn-primary btn-sm ms-auto">View Complaint Records</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Complaint Information</p>
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                      <h6>Complaint table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">House</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Number</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Street Address</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">City</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Country</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Relative Status</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Details Of Complaint</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Complaint Description</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Recorded By</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Injuries</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Complaint Date</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Position</th>
                                <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                            </tr>
                          </thead>
                          <tbody>
                          
                           
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
      
    </div>
    <footer class="footer pt-3  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              Powered <i class="fa fa-heart"></i> by
              <a href="" class="font-weight-bold" target="_blank">Digital Evangelicals</a>
             
            </div>
          </div>
         
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection