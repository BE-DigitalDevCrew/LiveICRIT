@extends('layouts.stafflayout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="main-content position-relative max-height-vh-100 h-100">
  <!-- Navbar -->
  <!-- End Navbar -->
  <div class="card shadow-lg mx-4 card-profile-bottom">
    
  </div>
    <!-- Navbar -->
    @if(Session::has('success'))
    <script type="text/javascript">
    function massge() {
    Swal.fire(
    'success',
    'Hospital Passport Added SUccessfully'
        );
        }
        window.onload = massge;
     </script>
  @endif
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0"></p>
              <a href="{{route('staff.viewhealthpassport')}}" class="btn btn-primary btn-sm ms-auto">View HospitalPassports</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm text-center">Seld Certification Form</p>
            <hr>
            <div class="row">
                <form method="POST" action="{{ route('staff.selfcert') }}">
                    @csrf
                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" name="job_title" id="job_title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="service_department">Service/Department</label>
                        <input type="text" name="service_department" id="service_department" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="absence_date">Absence Date(s)</label>
                        <input type="date" name="absence_date" id="absence_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="reason_of_absence">My Reason Of Absence Was</label>
                        <input type="text" name="reason_of_absence" id="reason_of_absence" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">I was absent due to an accident/incident at work</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="absent_due_to_accident" value="Yes" id="absent_yes">
                            <label class="form-check-label" for="absent_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="absent_due_to_accident" value="No" id="absent_no">
                            <label class="form-check-label" for="absent_no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">I consulted a medical practitioner</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="consulted_medical_practitioner" value="Yes" id="consulted_yes">
                            <label class="form-check-label" for="consulted_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="consulted_medical_practitioner" value="No" id="consulted_no">
                            <label class="form-check-label" for="consulted_no">No</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="medical_advice">The medical advice was as follows</label>
                        <textarea name="medical_advice" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="declaration">I declare that to the best of my knowledge the above information is accurate. I understand that if I knowingly make a false declaration, this may result in disciplinary action being taken which could result in my dismissal</label>
                        <textarea name="declaration" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="declaration_name">Declaration Name</label>
                        <input type="text" name="declaration_name" id="declaration_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="declaration_last_name">Declaration Last Name</label>
                        <input type="text" name="declaration_last_name" id="declaration_last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="declaration_date">Date</label>
                        <input type="date" name="declaration_date" id="declaration_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
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