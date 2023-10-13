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
              <p class="mb-0"></p>
              <a href="{{route('staff.viewincidencereport')}}" class="btn btn-primary btn-sm ms-auto">View Incidence Reports</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Incidence Report Information</p>
            <hr>
            <div class="row">
          <form method="POST" action="{{ route('staff.addincidencereport') }}">
    @csrf
    <div class="row">
        <div class="form-group">
            <label for="patient_id">Patient Name</label>
            <select name="patient_id" id="patient_id" class="form-control" required>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->client_name }} {{ $patient->surname }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="ref_number">Ref Number</label>
            <input type="text" name="ref_number" id="ref_number" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="time">Time</label>
            <input type="time" name="time" id="time" class="form-control" required>
        </div>
    </div>
    <div class="mb-3">
        <label for="person_affected">Was the person affected</label>
        <select name="person_affected" id="person_affected" class="form-select" required>
            <option value="">Select an option</option>
            <option value="A person we support">A person we support</option>
            <option value="A staff member">A staff member</option>
            <option value="Agency">Agency</option>
            <option value="N/A">N/A</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div class="col-md-12">
        <label for="initials">Initials of person causing harm/intimidation/damage or where known behaviors have changed:</label>
        <input type="text" name="initials" id="initials" class="form-control" required>
    </div>
    <div class="col-md-12">
        <label for="description">Please provide a full description of the incident (include any injuries or damage sustained)</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>
    <div class="col-md-12">
        <label for="identified_causes">Were there any identified causes to this incident?</label>
        <textarea name="identified_causes" id="identified_causes" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label for="date_completed">Please identify any other forms that were completed with this Incident Report</label>
        <select name="completed_forms" id="date_completed" class="form-select" required>
            <option value="Body Map">Body Map</option>
            <option value="Witness Statement">Witness Statement</option>
            <option value="Falls Checklist">Falls Checklist</option>
            <option value="Seizure Report">Seizure Report</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div class="col-md-12">
        <label for="name_of_person">Name Of Person Completing Form</label>
        <input type="text" name="name_of_person" id="name_of_person" class="form-control" required value="{{$user}}" readonly>
    </div>
    <div class="col-md-12">
        <label for="date_completed">Date Completed</label>
        <input type="date" name="date_completed" id="date_completed" class="form-control" required>
    </div>
    <div class="col-md-12">
        <label for="manager_on_call">Manager On Call</label>
        <input type="text" name="manager_on_call" id="manager_on_call" class="form-control" required>
    </div>
    <div class="row mt-3">
        <div class="col">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
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