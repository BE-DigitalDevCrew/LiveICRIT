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
             
              <!--<a href="{{route('staff.addincidencereport')}}" class="btn btn-primary btn-sm ms-auto">View Complaint Records</a>!-->
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm text-center">Medication Incident Reports</p>
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                    
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Patient Name</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Street Address</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Relative Status</th>
                                    <th>Details Of Complaint</th>
                                    <th>Complaint Description</th>
                                    <th>Recorded By</th>
                                    <th>Injuries</th>
                                    <th>Complaint Date</th>
                                    <th>Position</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medicationIncidents as $medicationIncident)
                                    <tr>
                                        <td>{{ $medicationIncident->user_name }}</td>
                                        <td>{{ $medicationIncident->patient_name }}</td>
                                        <td>{{ $medicationIncident->phone_number }}</td>
                                        <td>{{ $medicationIncident->address }}</td>
                                        <td>{{ $medicationIncident->email }}</td>
                                        <td>{{ $medicationIncident->street_address }}</td>
                                        <td>{{ $medicationIncident->city }}</td>
                                        <td>{{ $medicationIncident->country }}</td>
                                        <td>{{ $medicationIncident->relativeStatus }}</td>
                                        <td>{{ $medicationIncident->detailsOfComplaint }}</td>
                                        <td>{{ $medicationIncident->complaintDescription }}</td>
                                        <td>{{ $medicationIncident->recordedBy }}</td>
                                        <td>{{ $medicationIncident->injuries }}</td>
                                        <td>{{ $medicationIncident->complaintDate }}</td>
                                        <td>{{ $medicationIncident->position }}</td>
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