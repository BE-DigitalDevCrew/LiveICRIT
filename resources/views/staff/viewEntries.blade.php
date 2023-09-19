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
              <a href="{{route('staff.addentryrecord')}}" class="btn btn-primary btn-sm ms-auto">Add DailyEntry</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm text-center">Daily Entry Information</p>
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table table-bordered"  id = "dailyEntryTable">
                          <thead>
                              <tr>
                                  <th>User</th>
                                  <th>House</th>
                                  <th>Patient Name</th>
                                  <th>Date</th>
                                  <th>Shift</th>
                                  <th>Personal Care</th>
                                  <th>Medication Admin</th>
                                  <th>Appointments</th>
                                  <th>Activities</th>
                                  <th>Incident</th>
                                  <th>View Record</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($entries as $entry)
                              <tr>
                                  <td>{{ $entry->user_name }}</td>
                                  <td>{{ $entry->house }}</td>
                                  <td>{{ $entry->patient_name }}</td>
                                  <td>{{ $entry->date }}</td>
                                  <td>{{ $entry->shift }}</td>
                                  <td>{{ $entry->personal_care }}</td>
                                  <td>{{ $entry->medication_admin }}</td>
                                  <td>{{ $entry->appointments }}</td>
                                  <td>{{ $entry->activities }}</td>
                                  <td>{{ $entry->incident }}</td>
                                  </tr>
                              @endforeach
                              <nav aria-label="Page navigation">
                                  <ul class="pagination justify-content-center">
                                      {{-- Previous Page Link --}}
                                      @if ($entries->onFirstPage())
                                          <li class="page-item disabled">
                                              <span class="page-link" style="padding:30px;">Previous</span>
                                          </li>
                                      @else
                                          <li class="page-item">
                                              <a class="page-link" href="{{ $entries->previousPageUrl() }}" rel="prev">Previous</a>
                                          </li>
                                      @endif
                                      
                                      {{-- Next Page Link --}}
                                      @if ($entries->hasMorePages())
                                          <li class="page-item">
                                              <a class="page-link" style="padding:30px;" href="{{ $entries->nextPageUrl() }}" rel="next">Next</a>
                                          </li>
                                      @else
                                          <li class="page-item disabled">
                                              <span class="page-link">Next</span>
                                          </li>
                                      @endif
                                  </ul>
                              </nav>
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