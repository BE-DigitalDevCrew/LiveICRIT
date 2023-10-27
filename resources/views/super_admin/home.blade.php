@extends('layouts.adminlayout')
@section('content')
<div class="main-content position-relative max-height-vh-100 h-100">
  <!-- Navbar -->
 
  <!-- End Navbar -->
  <div class="card shadow-lg mx-4 card-profile-bottom">
    
  </div>
  <div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="d-flex flex-column h-100">
                      <p class="mb-1 pt-2 text-bold"></p>
                      <br><br>
                      <h1 class="font-weight-bolder" style="margin-left: 5%">ICRIT</h1>
                      <p class="mb-1 pt-2 text-bold" style="margin-left: 5%"> <strong> Welcome ,{{Auth::user()->username}}</strong> </p>
                      <a class="text-dark font-weight-bold ps-1 mb-0 icon-move-left mt-auto" href="javascript:;">
                        
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-4 me-auto ms-0 text-center">
                    <div class="bg-gradient-primary border-radius-lg min-height-200">
                      <img src="  {{asset('assets/img/shapes/waves-white.svg')}}" class="position-absolute h-100 top-0 d-md-block d-none" alt="waves">
                      <div class="position-relative pt-5 pb-4">
                        <img class="max-width-500 w-100 position-relative z-index-2" src="{{asset('assets/img/icritLogo.png')}}" 
                        style="height: 20%;width:20%; margin-left: 45%">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
    </div>
    <br><br>
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">SYSTEM USERS</p>
                    <h5 class="font-weight-bolder">
                      {{$total_users}}
                    </h5>
                    <p class="mb-0">
                      <span class="text-warning text-sm font-weight-bolder"> <a href="{{route('admin.viewusers')}}">Available <br> users</a> </span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">STAFF</p>
                    <h5 class="font-weight-bolder">
                      {{$total_staff}}
                    </h5>
                    <p class="mb-0">
                      <span class="text-warning text-sm font-weight-bolder"> <a href="{{route('admin.staff')}}">Available <br> staff</a></span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">HOUSES</p>
                    <h5 class="font-weight-bolder">
                      {{$total_houses}}
                    </h5>
                    <p class="mb-0">
                      <span class="text-warning text-sm font-weight-bolder"> <a href="{{route('admin.viewhouses')}}">Available <br> houses</a> </span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Partners</p>
                    <h5 class="font-weight-bolder">
                     0
                    </h5>
                    <p class="mb-0">
                      <span class="text-warning text-sm font-weight-bolder"> Available <br> partners</span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">DAILY ENTRIES</p>
                    <h5 class="font-weight-bolder">
                      {{$total_daily_entries }}
                    </h5>
                    <p class="mb-0">
                      <span class="text-warning text-sm font-weight-bolder"> <a href="{{route('admin.dailyentries')}}"> Available <br> entries</a></span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">CLIENTS</p>
                    <h5 class="font-weight-bolder">
                      {{$total_patients}}
                    </h5>
                    <p class="mb-0">
                      <span class="text-warning text-sm font-weight-bolder"><a href="{{route('admin.viewclients')}}"> Available <br> clients</a> </span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">COMPLAINT RECORDS</p>
                    <h5 class="font-weight-bolder">
                      8
                    </h5>
                    <p class="mb-0">
                      <span class="text-warning text-sm font-weight-bolder"> All <br> complaints</span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">SUPPORT PLANS</p>
                    <h5 class="font-weight-bolder">
                        {{$total_support_plans}}
                    </h5>
                    <p class="mb-0">
                      <span class="text-warning text-sm font-weight-bolder"> <a href="{{route('admin.viewsupportplan')}}"> All <br> support plans</a></span>
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h4 style="margin-left: 40%">Daily Entries Table</h4>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                    <th>Patient Name</th>
                    <th>Shift</th>
                    <th>Medication Admin</th>
                    <th>Incident</th>
                    <th>Appointment</th>
                    <th>Personal Care</th>
                    <th>Notes</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Export to PDF</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($entries as $entry)
                  @php
                  $input  = $entry->created_at;
                  $format1 = 'Y-m-d';
                  $format2 = 'H:i:s';
                  $date = Carbon\Carbon::parse($input)->format($format1);
                  $time = Carbon\Carbon::parse($input)->format($format2);
               @endphp
                  <tr>
                    <td>{{$entry->patient_name}}</td>
                    <td>{{$entry->shift}}</td>
                    <td>{{$entry->medication_admin}}</td>
                    <td>{{$entry->incident}}</td>
                    <td>{{$entry->appointments}}</td>
                    <td>{{$entry->personal_care}}</td>
                    <td>{{$entry->comments}}</td>
                    <td>{{$date}}</td>
                    <td>{{$time}}</td>
                    <td><a class="btn btn-primary" href="{{ route('dailyentry.pdf') }}">Download Record</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
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