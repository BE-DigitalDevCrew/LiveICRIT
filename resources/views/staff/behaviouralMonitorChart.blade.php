@extends('layouts.stafflayout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
               <a href="{{route('staff.allbcharts')}}" class="btn btn-primary btn-sm ms-auto">View Behavioural Monitor Charts</a>
            </div>
          </div>
          @if(Session::has('success'))
          <script type="text/javascript">
          function massge() {
          Swal.fire(
          'success',
          'Behavioural Monitor Chart Saved'
              );
              }
              window.onload = massge;
              </script>
        @endif
          <div class="card-body">
            <p class="text-uppercase text-sm">Behavioural Monitor Charts</p>
            <hr>
            <div class="row">
                <form method="POST" action="{{ route('staff.savebchart') }}">
                    @csrf      
            <div class="form-group">
                        <label for="patient_id">Patient Name</label>
                        <select name="patient_id" id="patient_id" class="form-control" required>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->patient_name }}</option>
                            @endforeach
                        </select>
                    </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Date</label>
            <div class="col-md-12">
                <!-- Day, Month, and Year selects go here -->
                <input type="date" class="form-control" name="date" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Known Behaviours</label>
            <div class="col-md-12">
                <!-- Day, Month, and Year selects go here -->
                <input type="text" class="form-control" name="knownBehaviours" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Totals</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="totals" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Time</label>
            <div class="col-md-12">
                <!-- Day, Month, and Year selects go here -->
                <input type="time" class="form-control" name="time" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Known Behaviour Reference</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="knownBehaviourReference" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Comments/ additional detail if needed</label>
            <div class="col-md-12">
                <!-- Day, Month, and Year selects go here -->
                <input type="text" class="form-control" name="comments" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <!-- Day, Month, and Year selects go here -->
                <label for="injuries" class="col-md-2 col-form-label">Injuries sustained by anyone?</label>
                <select name="injuries" class = "form-control">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Initials Of Person Completing Entry</label>
            <div class="col-md-12">
                <!-- Day, Month, and Year selects go here -->
                <input type="text" class="form-control" id="last_name" name="initials" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
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