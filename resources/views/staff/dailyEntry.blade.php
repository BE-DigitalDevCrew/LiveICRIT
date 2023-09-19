@extends('layouts.stafflayout')
@section('content')
<div class="main-content position-relative max-height-vh-100 h-100">
  <!-- Navbar -->
 
  <!-- End Navbar -->
  <div class="card shadow-lg mx-4 card-profile-bottom">
    <a href="{{route('staff.viewentryrecords')}}" class="btn btn-primary btn-sm ms-auto">View Daily Entries</a>
  </div>
  <div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <form method="POST" action="{{route('staff.addentryrecord')}}">
                @csrf
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="shift">Shift</label>
                    <select name="shift" id="shift" class="form-control" required>
                        <option value="Early">Early</option>
                        <option value="Late">Late</option>
                        <option value="LD">LD</option>
                        <option value="Night">Night</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="patient_id">Patient</label>
                    <select name="patient_id" id="patient_id" class="form-control" required>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->patient_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="personal_care">Personal Care</label>
                    <select name="personal_care" id="personal_care" class="form-control" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="medication_admin">Medication Admin</label>
                    <select name="medication_admin" id="medication_admin" class="form-control" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="appointments">Appointments</label>
                    <select name="appointments" id="appointments" class="form-control" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="activities">Activities</label>
                    <select name="activities" id="activities" class="form-control" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="incident">Incident</label>
                    <select name="incident" id="incident" class="form-control" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Daily Entry</button>
                </div>
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