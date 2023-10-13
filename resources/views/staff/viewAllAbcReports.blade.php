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
             
              <a href="{{route('staff.addabcreport')}}" class="btn btn-primary btn-sm ms-auto">Add ABC Report</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm"> ABCReport Information</p>
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                      <h6>ABC Reports table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>CreatedBy</th>
                                    <th>House</th>
                                    <th>Initials of Person</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Influencing Factors</th>
                                    <th>What Happened Before Incident</th>
                                    <th>Behaviors</th>
                                    <th>What Happened After Incident</th>
                                    <th>Immediate Actions</th>
                                    <th>Done Differently</th>
                                    <th>Proact SCIP Interventions</th>
                                    <th>Medication Administered</th>
                                    <th>Physical Contact/Injury/Intimidation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($abcReports as $report)
                                <tr>
                                    <td>{{ $report->user_name }}</td>
                                    <td>{{ $report->house_name}}</td>
                                    <td>{{ $report->initialsOfPerson }}</td>
                                    <td>{{ $report->start_time }}</td>
                                    <td>{{ $report->end_time }}</td>
                                    <td>{{ $report->influencing_factors }}</td>
                                    <td>{{ $report->what_happened_before_incident }}</td>
                                    <td>{{ $report->behaviors }}</td>
                                    <td>{{ $report->what_happened_after_incident }}</td>
                                    <td>{{ $report->immediate_actions }}</td>
                                    <td>{{ $report->done_differently }}</td>
                                    <td>{{ $report->proact_scip_interventions }}</td>
                                    <td>{{ $report->medication_administered }}</td>
                                    <td>{{ $report->physical_contact_injury_intimidation }}</td>
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