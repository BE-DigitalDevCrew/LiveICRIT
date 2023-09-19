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
              <p class="mb-0"></p>
              <a href="{{route('admin.viewentrylist')}}" class="btn btn-primary btn-sm ms-auto">View Daily Entries</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Daily Entry Information</p>
            <hr>
            <div class="row">
                <form  action="{{route('admin.addentrylist')}}" method="POST">
                    @csrf
                   
                   
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Date</label>
                              <input class="form-control" type="text"  name="username" id="username" required>
                            </div>
                          </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Shift</label>
                             <select class="form-control" name="shift" id="shift">
                                <option class="form-group" value="Day">Day</option>
                                <option value="form-group" value="Night">Night</option>
                             </select>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="example-text-input" class="form-control-label">Patient Name</label>
                            <select class="form-control" name="patient_id" id="patient_id" class="form-control" required>
                                    <option class="form-group" value=""></option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="example-text-input" class="form-control-label">Personal Care</label>
                            <select class="form-control" name="personal_care" id="personal_care" class="form-control" required>
                                <option class="form-group" value="Yes">Yes</option>
                                <option class="form-group" value="No">No</option>
                            </select>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-6">
                            <label for="personal_care">Personal Care</label>
                            <select class="form-control" name="personal_care" id="personal_care" class="form-control" required>
                                <option class="form-group" value="Yes">Yes</option>
                                <option class="form-group" value="No">No</option>
                            </select>
                        </div>
    
                        <div class="col-md-6">
                            <label for="medication_admin">Medication Admin</label>
                            <select class="form-control" name="medication_admin" id="medication_admin" class="form-control" required>
                                <option class="form-group" value="Yes">Yes</option>
                                <option class="form-group" value="No">No</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="appointments">Appointments</label>
                            <select class="form-control" name="appointments" id="appointments" class="form-control" required>
                                <option class="form-group" value="Yes">Yes</option>
                                <option class="form-group" value="No">No</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="activities">Activities</label>
                            <select class="form-control" name="activities" id="activities" class="form-control" required>
                                <option class="form-group" value="Yes">Yes</option>
                                <option class="form-group" value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="incident">Incident</label>
                            <select class="form-control" name="incident" id="incident" class="form-control" required>
                                <option class="form-group" value="Yes">Yes</option>
                                <option class="form-group" value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Add User</button>
                </form>
            
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