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
              <p class="mb-0">User Profile</p>
              <a href="{{route('staff.viewpatients')}}" class="btn btn-primary btn-sm ms-auto">View Patients</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Patient Information</p>
            <div class="row">
                <form  action="{{route('staff.addpatient')}}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Patient name</label>
                          <input class="form-control" type="text"  name="patient_name" id="username" required>
                        </div>
                      </div>
                   
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Patient email</label>
                        <input class="form-control" type="email"  name="email" id="email" required>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Patient Housename</label>
                              <select class="form-control" name="house_name" >
                                <option class="form-group" value="Hearten">Hearten</option>
                                <option class="form-group" value="Lorraine">Lorraine</option>
                            </select>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">User ID</label>
                            <input class="form-control" type="text"  name="user_id" id="user_id" required>
                          </div>
                        </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Patient Address</label>
                          <input class="form-control" type="text"  name="address" id="address" required>
                        </div>
                      </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Patient Phonenumber</label>
                        <input class="form-control" type="text"  name="phone_number" id="phone_number" required>
                      </div>
                    </div>
              </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Patient AssociatedStaff</label>
                              <select class="form-control" name="staff_id" id="staff_id">
                                @if ($carers)
                                    @foreach($carers as $user)
                                        <option value="{{ $user->id.' '.$user->username}} ">{{ $user->username}}~{{ $user->type}} </option>
                                    @endforeach
                                @endif
                              </select>
                            </div>
                          </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Add Patient</button>
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