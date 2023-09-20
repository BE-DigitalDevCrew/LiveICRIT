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
                        <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th>User Name</th>
                                  <th>House</th>
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
                                  <th>Created At</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($complaintRecords as $record)
                              <tr>
                                  <td>{{ $record->user_name }}</td>
                                  <td>{{ $record->house }}</td>
                                  <td>{{ $record->patient_name }}</td>
                                  <td>{{ $record->phone_number }}</td>
                                  <td>{{ $record->address }}</td>
                                  <td>{{ $record->email }}</td>
                                  <td>{{ $record->street_address }}</td>
                                  <td>{{ $record->city }}</td>
                                  <td>{{ $record->country }}</td>
                                  <td>{{ $record->relative_status }}</td>
                                  <td>{{ $record->detailsOfComplaint }}</td>
                                  <td>{{ $record->complaintDescription }}</td>
                                  <td>{{ $record->recordedBy }}</td>
                                  <td>{{ $record->injuries }}</td>
                                  <td>{{ $record->complaintDate }}</td>
                                  <td>{{ $record->position }}</td>
                                  <td>{{ $record->created_at }}</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                                          </div>        
                                          {{ $complaintRecords->links() }} <!-- Display pagination links -->
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