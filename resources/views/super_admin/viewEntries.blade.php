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
             
            
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Daily Entry Information</p>
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                      <h6>Entries table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient Name</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Shift</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Activities</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Appointments</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Medication Admin</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Incident</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                              <th class="text-secondary opacity-7"></th>
                            </tr>
                          </thead>
                          <tbody>
                          
                            @foreach($patients as $patient)
                            <tr>
                           
                              <td>
                                <p class="text-xs font-weight-bold mb-0">{{$patient->patient_name}}</p>
                                
                              </td>
                              <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold">{{$patient->shift}}</span>
                              </td>
                              <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$patient->activities}}</span>
                              </td>
                             
                              <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold">{{$patient->medication_admin}}</span>
                              </td>
                              <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$patient->incident}}</span>
                              </td>
                              <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$patient->appointments}}</span>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0">{{$patient->date}}</p> 
                              </td>
                              <td class="align-justified">
                                <div class="row">
                                  <div class="col-md-6">
                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                      <i class="fa fa-edit"></i> Edit
                                    </a>
                                  </div>
                                  <div class="col-md-6">
                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                      <i class="fa fa-trash"></i> Remove
                                    </a>
                                  </div>
                                </div>
                              </td>
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