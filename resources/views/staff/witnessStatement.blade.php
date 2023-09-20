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
    'Witness Statement Saved'
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
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Witness Statement</p>
            <hr>
            <div class="row">
                <form method="POST" action="{{ route('staff.addwitnessstatement') }}">
                    @csrf
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-2 col-form-label">Ref Number</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="phone_number" name="ref_number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-2 col-form-label">Injured Person</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="address" name="injured_person" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label">Date OF Accident</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control" id="email" name="date_of_accident" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label">Time Of Accident</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control" id="email" name="time_of_accident" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="street_address" class="col-md-2 col-form-label">Witness DOB</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control" id="street_address" name="witness_dob" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-2 col-form-label">Witness Home Address</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="city" name="witness_homeaddress" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-2 col-form-label">Street Addres</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="country" name="street_address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-2 col-form-label">City</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="country" name="city" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-2 col-form-label">County</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="country" name="county" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-2 col-form-label">Telephone Number</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="country" name="tel_number" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">Is the witness a FitzRoy employee?</label>
                            <select name="fitzRoyEmployee" id="personal_care" class="form-control" required>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="detailsOfComplaint" class="col-md-2 col-form-label">Occupation</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="detailsOfComplaint" name="occupation" required>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="recordedBy" class="col-md-2 col-form-label">What Happened</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="recordedBy" name="what_happened" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Check all that apply to the person's position:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="position[]" value="Standing" id="position_standing">
                                <label class="form-check-label" for="position_standing">Standing</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="position[]" value="Sitting" id="position_sitting">
                                <label class="form-check-label" for="position_sitting">Sitting</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="position[]" value="In bed" id="position_in_bed">
                                <label class="form-check-label" for="position_in_bed">In bed</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="position[]" value="Unobserved Seizure" id="position_unobserved_seizure">
                                <label class="form-check-label" for="position_unobserved_seizure">Unobserved Seizure</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="position[]" value="Other" id="position_other">
                                <label class="form-check-label" for="position_other">Other</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recordedBy" class="col-md-12 col-form-label">Please describe in your own words what you saw of the above Accident/Incident and detail any involvement that you had. Please provide a sketch/plan if it would help you to describe what you witnessed (separate sheet is attached)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="recordedBy" name="description_accident" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recordedBy" class="col-md-12 col-form-label">Where were you positioned in relation to the injured person</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="recordedBy" name="where_were_you_positioned" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recordedBy" class="col-md-12 col-form-label">Any Other Information</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="recordedBy" name="any_other_information" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger">Submit</button>
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