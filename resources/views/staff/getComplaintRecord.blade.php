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
              <a href="{{route('staff.viewcomplaintrecord')}}" class="btn btn-primary btn-sm ms-auto">View All Complaint Records</a>
            </div>
          </div>
          @if(Session::has('success'))
          <script type="text/javascript">
          function massge() {
          Swal.fire(
          'success',
          'Complaint Recorded Successfully'
              );
              }
              window.onload = massge;
              </script>
        @endif
          <div class="card-body">
            <p class="text-uppercase text-sm">Complaint Record</p>
            <hr>
            <div class="row">
                <form method="POST" action="{{ route('staff.addcompaintrecord') }}">
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
                            <label for="address" class="col-md-2 col-form-label">Phone Number</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="address" name="phone_number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="email" name="address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="street_address" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"  name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="street_address" class="col-md-2 col-form-label">City</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"  name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="street_address" class="col-md-2 col-form-label">County</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control"  name="county" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="street_address" class="col-md-2 col-form-label">Street Address</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="street_address" name="street_address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-2 col-form-label">City</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-2 col-form-label">Country</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="country" name="country" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="relativeStatus" class="col-md-2 col-form-label">Status Of Complaint</label>
                            <div class="col-md-12">
                                <select name="relativeStatus" id="relativeStatus" class="form-control">
                                    <option value="Parent/Relative">Parent/Relative</option>
                                    <option value="Person we Support">Person We Support</option>
                                    <option value="Social Worker">Social Worker</option>
                                    <option value="Neighbour">Neighbour</option>
                                    <option value="Advocate/Friend">Advocate/Friend</option>
                                    <option value="Other">Other (Please Specify)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detailsOfComplaint" class="col-md-2 col-form-label">Details Of Complainant</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="detailsOfComplaint" name="detailsOfComplaint" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="complaintDescription" class="col-md-2 col-form-label">What description best fits the complaint/concern</label>
                            <div class="col-md-12">
                                <select name="complaintDescription" id="complaintDescription" class="form-control">
                                    <option value="Staff Action">Staff Action</option>
                                    <option value="Tenant/Resident's Action">Tenant/Resident's Action</option>
                                    <option value="Both">Both</option>
                                    <option value="A Disputed Decision">A Disputed Decision</option>
                                    <option value="An Oversight">An Oversight</option>
                                    <option value="A Misunderstanding">A Misunderstanding</option>
                                    <option value="Violence">Violence</option>
                                    <option value="Theft">Theft</option>
                                    <option value="Verbal Insults">Verbal Insults</option>
                                    <option value="Personal Upset">Personal Upset</option>
                                    <option value="Other">Other (Specify)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="recordedBy" class="col-md-2 col-form-label">This complaint/concern was recorded by</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="recordedBy" name="recordedBy" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="complaintDate" class="col-md-2 col-form-label">Date</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control" id="complaintDate" name="complaintDate" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="col-md-2 col-form-label">Position Held By</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="position" name="position" required>
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