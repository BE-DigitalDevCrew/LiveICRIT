@extends('layouts.pdflayout')
@section('content')
<div class="main-content position-relative max-height-vh-100 h-100">
  <!-- Navbar -->
 
  <!-- End Navbar -->
  <div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h4 style="margin-left: 40%">Daily Entries</h4>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  
                <tbody>
                  @forelse($entries as $entry)
                  <tr>
                    <th>Patient Name</th>
                    <td>{{$entry->patient_name}}</td>
                </tr>
                <tr>
                    <th>Shift</th>
                    <td>{{$entry->shift}}</td>
                </tr>
                <tr>
                    <th>Medication Admin</th>
                    <td>{{$entry->medication_admin}}</td>
                </tr>
                <tr>
                    <th>Incident</th>
                    <td>{{$entry->incident}}</td>
                </tr>
                <tr>
                    <th>Appointment</th>
                    <td>{{$entry->appointments}}</td>
                </tr>
                <tr>
                    <th>Personal Care</th>
                    <td>{{$entry->personal_care}}</td>
                </tr>
                <tr>
                    <th>Notes</th>
                    <td>{{$entry->comments}}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{$entry->date}}</td>
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
  <div class="container-fluid py-4">
      <br>
     <br> <br> <br>
    <footer class="footer pt-3  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>
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