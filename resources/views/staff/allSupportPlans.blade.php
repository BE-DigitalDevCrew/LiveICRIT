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
             
              <a href="{{route('staff.addsupportplan')}}" class="btn btn-primary btn-sm ms-auto">Add Support Plan</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm"> SupportPlan Information</p>
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                      <h6>SupportPlan table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table">
                          <thead>
                              <tr>
                                  <th>Created By</th>
                                  <th>Patient Name</th>
                                  <th>Communication Skills</th>
                                  <th>Friendships and Personal Relationships</th>
                                  <th>Mobility Dexterity</th>
                                  <th>Routines And Personal Care</th>
                                  <th>Needs</th>
                                  <th>Emotions</th>
                                  <th>Daily Driving Skills</th>
                                  <th>General Health Skills</th>
                                  <th>Medication Support</th>
                                  <th>Recreation And Relations</th>
                                  <th>Psychological Support</th>
                                  <th>Finance</th>
                                  <th>Staff Email</th>
                                  <!-- Add more table headers for the other fields --> 
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($supportPlans as $supportPlan)
                                  <tr>
                                      <td>{{ $supportPlan->user_name }}</td>
                                      <td>{{ $supportPlan->patient_name }}</td>
                                      <td>{{ $supportPlan->comm_skills }}</td>
                                      <td>{{ $supportPlan->friend_fam }}</td>
                                      <td>{{ $supportPlan->mobility_dexterity }}</td>
                                      <td>{{ $supportPlan->routines_personal_care }}</td>
                                      <td>{{ $supportPlan->needs }}</td>
                                      <td>{{ $supportPlan->emotions }}</td>
                                      <td>{{ $supportPlan->daily_living_skills }}</td>
                                      <td>{{ $supportPlan->general_health_needs }}</td>
                                      <td>{{ $supportPlan->medication_support }}</td>
                                      <td>{{ $supportPlan->recreation_and_relation}}</td>
                                      <td>{{ $supportPlan->eating_drinking_nutrition}}</td>
                                      <td>{{ $supportPlan->psychological_support}}</td>
                                      <td>{{ $supportPlan->finance}}</td>
                                      <td>{{ $supportPlan->staff_email}}</td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                      {{ $supportPlans->links() }} <!-- Display pagination links -->
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