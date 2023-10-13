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
             
              <a href="{{route('staff.addincidencereport')}}" class="btn btn-primary btn-sm ms-auto">Add Incidence Report</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Incidence Information</p>
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                      <h6>Incidences table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                           
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reference Number</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Location</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Person Affected</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Initials</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Identified Causes</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completed Forms</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name of Person</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Completed</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Manager on Call</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($incident_reports as $entry)
                            <tr>
                              <td>{{ $entry->client_name }}</td>
                              <td>{{ $entry->ref_number }}</td>
                              <td>{{ $entry->location }}</td>
                              <td>{{ $entry->date }}</td>
                              <td>{{ $entry->time }}</td>
                              <td>{{ $entry->person_affected }}</td>
                              <td>{{ $entry->initials }}</td>
                              <td>{{ $entry->description }}</td>
                              <td>{{ $entry->identified_causes }}</td>
                              <td>{{ $entry->completed_forms }}</td>
                              <td>{{ $entry->name_of_person }}</td>
                              <td>{{ $entry->date_completed }}</td>
                              <td>{{ $entry->manager_on_call }}</td>
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