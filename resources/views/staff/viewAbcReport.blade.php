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
    'Abc Report Saved Successfully'
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
              <a href="{{route('staff.viewhealthpassport')}}" class="btn btn-primary btn-sm ms-auto">View Abc Reports</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Abc Report</p>
            <hr>
            <div class="row">
                <form method="POST" action="{{ route('save-abcReport') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Initials of person causing harm/intimidation/damage:</label>
                        <input type="text" class="form-control" name="initialsOfPerson" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Start Time</label>
                        <input type="time" class="form-control" name="start_time" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">End Time</label>
                        <input type="time" class="form-control" name="end_time" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Influencing factors or known trigger for behaviors? (Consider up to 48hrs prior)</label>
                        <input type="text" class="form-control" name="influencing_factors" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">What was happening immediately before the incident? (Include who was there and what was happening)</label>
                        <input type="text" class="form-control" name="what_happened_before_incident" required>
                    </div>
                
                    <div class="mb-3">
                        <label class="form-label">Behaviors exhibited/what happened?</label><br>
                        <input type="checkbox" name="behaviors[]" value="Physical">
                        <label class="form-check-label">Physical</label><br>
                        <input type="checkbox" name="behaviors[]" value="Verbal">
                        <label class="form-check-label">Verbal</label><br>
                        <input type="checkbox" name="behaviors[]" value="Damage">
                        <label class="form-check-label">Damage</label><br>
                        <input type="checkbox" name="behaviors[]" value="Other">
                        <label class="form-check-label">Other</label><br>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">What happened immediately after the incident?</label>
                        <input type="text" class="form-control" name="what_happened_after_incident" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Immediate Actions</label>
                        <input type="text" class="form-control" name="immediate_actions" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">On reflection, is there anything that could have been done differently or ideas to prevent future adverse incidents?</label>
                        <input type="text" class="form-control" name="done_differently" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Were PROACT SCIPr interventions used?</label><br>
                        <input type="radio" name="proact_scip_interventions" value="Yes">
                        <label class="form-check-label">Yes</label><br>
                        <input type="radio" name="proact_scip_interventions" value="No">
                        <label class="form-check-label">No</label><br>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Was medication administered in accordance with individual protocols?</label><br>
                        <input type="radio" name="medication_administered" value="Yes">
                        <label class="form-check-label">Yes</label><br>
                        <input type="radio" name="medication_administered" value="No">
                        <label class="form-check-label">No</label><br>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Was there physical contact/injury or intimidation on anyone else (no matter how minor)?</label><br>
                        <input type="radio" name="physical_contact_injury_intimidation" value="Yes">
                        <label class="form-check-label">Yes</label><br>
                        <input type="radio" name="physical_contact_injury_intimidation" value="No">
                        <label class="form-check-label">No</label><br>
                    </div>
                    <!-- Add more sections for the remaining points in the template -->
                    <button type="submit" class="btn btn-primary">Submit</button>
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