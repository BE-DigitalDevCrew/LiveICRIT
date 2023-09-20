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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center" style="size: 22px;">Seizure Reports</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>House</th>
                                            <th>Patient Name</th>
                                            <th>Date of Incident</th>
                                            <th>Time of Incident</th>
                                            <th>Other Forms 1</th>
                                            <th>Other Forms 2</th>
                                            <th>Did Fall</th>
                                            <th>Initials of Harm</th>
                                            <th>Incident Description</th>
                                            <th>Any Causes to Incident</th>
                                            <th>Any Other Forms</th>
                                            <th>Stiffen</th>
                                            <th>Consciousness</th>
                                            <th>Color</th>
                                            <th>Movement</th>
                                            <th>Breathing</th>
                                            <th>Parts</th>
                                            <th>How Long Seizure</th>
                                            <th>Incontinence</th>
                                            <th>Condition After Seizure</th>
                                            <th>Recovery Date</th>
                                            <th>Person Injury</th>
                                            <th>Treatment</th>
                                            <th>Triggers</th>
                                            <th>Reported By</th>
                                            <th>Report Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($seizureReports as $report)
                                        <tr>
                                            <td>{{ $report->user_name }}</td>
                                            <td>{{ $report->house }}</td>
                                            <td>{{ $report->patient_name }}</td>
                                            <td>{{ $report->date_of_incident }}</td>
                                            <td>{{ $report->time_of_incident }}</td>
                                            <td>{{ $report->other_forms_1 }}</td>
                                            <td>{{ $report->other_forms_2 }}</td>
                                            <td>{{ $report->did_fall }}</td>
                                            <td>{{ $report->initials_of_harm }}</td>
                                            <td>{{ $report->incident_description }}</td>
                                            <td>{{ $report->any_causes_to_incident }}</td>
                                            <td>{{ $report->any_other_forms }}</td>
                                            <td>{{ $report->stiffen }}</td>
                                            <td>{{ $report->consciousness }}</td>
                                            <td>{{ $report->color }}</td>
                                            <td>{{ $report->movement }}</td>
                                            <td>{{ $report->breathing }}</td>
                                            <td>{{ $report->parts }}</td>
                                            <td>{{ $report->how_long_seizure }}</td>
                                            <td>{{ $report->incontinence }}</td>
                                            <td>{{ $report->condition_after_seizure }}</td>
                                            <td>{{ $report->recovery_date }}</td>
                                            <td>{{ $report->person_injury }}</td>
                                            <td>{{ $report->treatment }}</td>
                                            <td>{{ $report->triggers }}</td>
                                            <td>{{ $report->reported_by }}</td>
                                            <td>{{ $report->report_date }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                {{ $seizureReports->links() }} {{-- Display pagination links --}}
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