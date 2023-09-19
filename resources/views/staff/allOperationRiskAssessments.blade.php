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
             
              <a href="{{route('staff.addriskassessment')}}" class="btn btn-primary btn-sm ms-auto">Add Incidence Report</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Incidence Information</p>
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                      <h6>Incidences table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Assessment Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Assessor's Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">What Could Cause Harm</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Where is the Hazard</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" >Who Might Be Harmed</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">How Will They Be Harmed</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">How Often Are They Exposed to This Hazard</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">How Long Each Time Are They Exposed</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Disallowing Activity</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Comment</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Likelihood of Harm</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">List of Control Measures</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Date When Control Measures Were Implemented</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Training Required to Reduce Risk</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date When Training Was Specified</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Equipment to Reduce Risk</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Equipment Was Provided</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Likelihood of Harm (Radio)</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> How Serious Could Be the Harm (Radio)</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Additional Control Measures</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Risk Assessment Drawn By</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Risk Assessment Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Assessment Taken Account of Mental Capacity Act</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Comment on Behaviors/Communication Preferences</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Possible Deprivation of Liberty Issue</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Best Interest Meeting Required</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Review</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Changes Required</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Manager's Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Risk Assessment Activity Accessed</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Assessment</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Signage Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Signage Date</th>
                            </tr>
                          </thead>
                          <tbody>
                          
                           
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