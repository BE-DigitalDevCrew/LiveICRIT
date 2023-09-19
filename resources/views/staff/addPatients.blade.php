@extends('layouts.stafflayout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="main-content position-relative max-height-vh-100 h-100">
  <!-- Navbar -->
  <!-- End Navbar -->
  @if(Session::has('success'))
              <script type="text/javascript">
              function massge() {
              Swal.fire(
              'success',
              'Patient added successfully.'
                  );
                  }
                  window.onload = massge;
               </script>
  @endif
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
            <form method="POST" action="{{ route('staff.addpatient') }}">
              @csrf
              <div class="form-group">
                  <label for="patient_name">Name</label>
                  <input type="text" name="patient_name" id="patient_name" class="form-control" required>
              </div>
              <h5 class="text-center">Select A House</h5>
              <br>
              <div class="form-group">
                  <select name="house" class="form-control">
                      <option value="hearten">hearten</option>
                      <option value="lorraine">lorraine</option>
                  </select>
              </div>
              {{-- Dropdown to select the associated user --}}
              <div class="form-group">
                <label for="Staff_Id">Staff Member</label>
                <select name="Staff_Id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                    @endforeach
                </select>
            </div>
              <div class="form-group">
                  <label for="id_number">Id Number</label>
                  <input type="text" name="id_number" id="id_number" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" name="address" id="address" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="phone_number">Phone Number</label>
                  <input type="text" name="phone_number" id="phone_number" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" class="form-control" required>
              </div>
              <br>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Add Patient</button>
              </div>
              <br>
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