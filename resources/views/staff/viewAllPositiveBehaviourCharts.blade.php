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
             
              <a href="{{route('staff.addincidencereport')}}" class="btn btn-primary btn-sm ms-auto">View Complaint Records</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm text-center">Behavioural Support Plans</p>
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>House</th>
                                    <th>Patient Name</th>
                                    <th>Date</th>
                                    <th>Review Date</th>
                                    <th>Home Location</th>
                                    <th>Street Address</th>
                                    <th>City</th>
                                    <th>Completed By</th>
                                    <th>What I do when I am happy or angry (BEHAVIORS)</th>
                                    <th>Triggers</th>
                                    <th>Actions to Support Me</th>
                                    <th>How I look when I am Calm relaxed</th>
                                    <th>The things staff can do to keep me in the green</th>
                                    <th>How I look when I am becoming anxious or aroused</th>
                                    <th>The things staff can say or do to manage the situation</th>
                                    <th>The things staff can say or do to manage the situation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supportPlans as $supportPlan)
                                    <tr>
                                        <td>{{ $supportPlan->user_name }}</td>
                                        <td>{{ $supportPlan->house }}</td>
                                        <td>{{ $supportPlan->patient_name }}</td>
                                        <td>{{ $supportPlan->todays_date }}</td>
                                        <td>{{ $supportPlan->review_date }}</td>
                                        <td>{{ $supportPlan->home_location }}</td>
                                        <td>{{ $supportPlan->street_address }}</td>
                                        <td>{{ $supportPlan->city }}</td>
                                        <td>{{ $supportPlan->county }}</td>
                                        <td>{{ $supportPlan->completed_by }}</td>
                                        <td>{{ $supportPlan->behaviours_when_happy_angry }}</td>
                                        <td>{{ $supportPlan->triggers }}</td>
                                        <td>{{ $supportPlan->actions }}</td>
                                        <td>{{ $supportPlan->behaviour_calm }}</td>
                                        <td>{{ $supportPlan->support_strategies}}</td>
                                        <td>{{ $supportPlan->recovery_period}}</td>
                                        <td>{{ $supportPlan->staff_email}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
         
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