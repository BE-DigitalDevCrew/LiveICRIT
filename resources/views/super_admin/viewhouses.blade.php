@extends('layouts.adminlayout')
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
             
              <a href="{{route('admin.addhouse')}}" class="btn btn-primary btn-sm ms-auto">Add House</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">House Information</p>
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                      <h6>Houses table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">House Name
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{$total_lorraine->house_name}}</h6>
                                  </div>
                                </div>
                              </td>
                              <tr>
                                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Patients
                                  <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">{{$total_lorraine_users}}</h6>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tr>
                          </thead>
                          <tbody>
                         
                          </tbody>
                        </table>
                      </div>
                    </div>
                    
                  </div>
                  <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">House Name
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{$total_hearten->house_name}}</h6>
                                  </div>
                                </div>
                              </td>
                              <tr>
                                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Patients
                                  <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">{{$total_hearten_users}}</h6>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tr>
                          </thead>
                          <tbody>
                         
                          </tbody>
                        </table>
                      </div>
                    </div>
                    
                  </div>
                  <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">House Name
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{$total_oakdale->house_name}}</h6>
                                  </div>
                                </div>
                              </td>
                              <tr>
                                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Patients
                                  <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">{{$total_oakdale_users}}</h6>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tr>
                          </thead>
                          <tbody>
                         
                          </tbody>
                        </table>
                      </div>
                    </div>
                    
                  </div>
                  <div class="card mb-4">
                   
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">House Name
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{$total_wyresdale->house_name}}</h6>
                                  </div>
                                </div>
                              </td>
                              <tr>
                                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Patients
                                  <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="mb-0 text-sm">{{$total_wyresdale_users}}</h6>
                                    </div>
                                  </div>
                                </td>
                              </tr>
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