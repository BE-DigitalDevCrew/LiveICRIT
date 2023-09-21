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
             
             
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm text-center">Operation Risk Assessments</p>
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
                                  <th>User</th>
                                  <th>Patient</th>
                                  <th>Assessment Date</th>
                                  <th>Assessor's Email</th>
                                  <th>What Could Cause Harm</th>
                                  <th>Where is the Hazard</th>
                                  <th>Who Might Be Harmed</th>
                                  <th>How Will They Be Harmed</th>
                                  <th>How Often Are They Exposed to This Hazard</th>
                                  <th>How Long Each Time Are They Exposed</th>
                                  <th>Disallowing Activity</th>
                                  <th>Comment</th>
                                  <th>Likelihood of Harm</th>
                                  <th>List of Control Measures</th>
                                  <th>Date When Control Measures Were Implemented</th>
                                  <th>Training Required to Reduce Risk</th>
                                  <th>Date When Training Was Specified</th>
                                  <th>Equipment to Reduce Risk</th>
                                  <th>Date Equipment Was Provided</th>
                                  <th>Likelihood of Harm (Radio)</th>
                                  <th>How Serious Could Be the Harm (Radio)</th>
                                  <th>Additional Control Measures</th>
                                  <th>Risk Assessment Drawn By</th>
                                  <th>Risk Assessment Date</th>
                                  <th>Assessment Taken Account of Mental Capacity Act</th>
                                  <th>Comment on Behaviors/Communication Preferences</th>
                                  <th>Possible Deprivation of Liberty Issue</th>
                                  <th>Best Interest Meeting Required</th>
                                  <th>Date of Review</th>
                                  <th>Changes Required</th>
                                  <th>Manager's Name</th>
                                  <th>Risk Assessment Activity Accessed</th>
                                  <th>Date of Assessment</th>
                                  <th>Signage Name</th>
                                  <th>Signage Date</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($data as $assessment)
                                  <tr>
                                      <td>{{ $assessment->user_name }}</td>
                                      <td>{{ $assessment->patient_name }}</td>
                                      <td>{{ $assessment->assessment_date }}</td>
                                      <td>{{ $assessment->assessors_email }}</td>
                                      <td>{{ $assessment->what_causes_harm }}</td>
                                      <td>{{ $assessment->where_is_the_hazard }}</td>
                                      <td>{{ $assessment->who_might_be_harmed }}</td>
                                      <td>{{ $assessment->how_will_they_be_harmed }}</td>
                                      <td>{{ $assessment->how_often_are_exposed_hazard }}</td>
                                      <td>{{ $assessment->how_long_exposed_hazard }}</td>
                                      <td>{{ $assessment->disallowing_activity }}</td>
                                      <td>{{ $assessment->comment }}</td>
                                      <td>{{ $assessment->likelihood_harm }}</td>
                                      <td>{{ $assessment->list_of_control_measures }}</td>
                                      <td>{{ $assessment->date_when_control_measures_implemented }}</td>
                                      <td>{{ $assessment->identity_training_required_risk }}</td>
                                      <td>{{ $assessment->identity_training_was_specified }}</td>
                                      <td>{{ $assessment->entity_equipment_reduced_risk }}</td>
                                      <td>{{ $assessment->date_equipment_provided }}</td>
                                      <td>{{ $assessment->likelihood_radio_harm }}</td>
                                      <td>{{ $assessment->how_serious_harm_radio }}</td>
                                      <td>{{ $assessment->additional_control_measures }}</td>
                                      <td>{{ $assessment->risk_assessment_drawn_by }}</td>
                                      <td>{{ $assessment->risk_assessment_date }}</td>
                                      <td>{{ $assessment->assessment_taken_mental }}</td>
                                      <td>{{ $assessment->please_comment_any_behaviours }}</td>
                                      <td>{{ $assessment->positive_liberty_issue }}</td>
                                      <td>{{ $assessment->outcome_best_interest_radio }}</td>
                                      <td>{{ $assessment->date_of_review }}</td>
                                      <td>{{ $assessment->changes_required }}</td>
                                      <td>{{ $assessment->managers_name }}</td>
                                      <td>{{ $assessment->risk_assessment_Activity_accessed }}</td>
                                      <td>{{ $assessment->date_of_assessment }}</td>
                                      <td>{{ $assessment->signage_name }}</td>
                                      <td>{{ $assessment->signage_date }}</td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                      {{ $data->links() }} <!-- Pagination links -->                      </div>
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