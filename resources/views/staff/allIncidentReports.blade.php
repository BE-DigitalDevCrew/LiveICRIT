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
                      <h6>Incidence Reports Table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table">
                          <thead>
                              <tr>
                                  <th>User</th>
                                  <th>Patient Name</th>
                                  <th>Reference Number</th>
                                  <th>Location</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Person Affected</th>
                                  <th>Initials</th>
                                  <th>Description</th>
                                  <th>Identified Causes</th>
                                  <th>Completed Forms</th>
                                  <th>Name of Person</th>
                                  <th>Date Completed</th>
                                  <th>Manager on Call</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($entries as $entry)
                              <tr>
                                  <td>{{ $entry->user_name }}</td>
                                  <td>{{ $entry->patient_name }}</td>
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
                  {{ $entries->links() }} <!-- Display pagination links -->
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