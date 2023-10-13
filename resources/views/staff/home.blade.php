@extends('layouts.stafflayout')
@section('content')
<div class="container-fluid py-4">
  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="d-flex flex-column h-100">
                <p class="mb-1 pt-2 text-bold"></p>
                <br><br>
                <h1 class="font-weight-bolder" style="margin-left: 5%">ICRIT</h1>
                <p class="mb-1 pt-2 text-bold" style="margin-left: 5%"> <strong> Welcome , <span> {{ Auth::user()->username }}</span> </strong> </p>
                <p class="mb-1 pt-2 text-bold" style="margin-left: 5%"> <strong> Your House is <span> {{ Auth::user()->house_name }}</span> </strong> </p>
                <a class="text-dark font-weight-bold ps-1 mb-0 icon-move-left mt-auto" href="javascript:;">
                </a>
              </div>
            </div>
            <div class="col-lg-4 me-auto ms-0 text-center">
              <div class="bg-gradient-primary border-radius-lg min-height-200">
                <img src=" {{asset('assets/img/shapes/waves-white.svg')}}" class="position-absolute h-100 top-0 d-md-block d-none" alt="waves">
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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">DAILY ENTRIES</p>
                <h5 class="font-weight-bolder">
                  {{$totalEntriesCount}}
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> Available <br> entries</span>
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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">COMPLAINTS</p>
                <h5 class="font-weight-bolder">
                  0
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> Available <br> complaints</span>
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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">HOSPITAL PASSPORTS</p>
                <h5 class="font-weight-bolder">
                  8
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> Available <br> passports</span>
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
                  5 
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> Available <br> plans</span>
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
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">WITNESS STATEMENTS</p>
                <h5 class="font-weight-bolder">
                  10
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> Available <br> statements</span>
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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">ABC Reports</p>
                <h5 class="font-weight-bolder">
                  2
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> Available <br> reports</span>
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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">INCIDENCE REPORTS</p>
                <h5 class="font-weight-bolder">
                  4
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> Available <br> reports</span>
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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">PATIENTS</p>
                <h5 class="font-weight-bolder">
                  5
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> <a href="{{route('staff.viewpatients')}}"> Available <br> patients </a></span>
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-success text-center rounded-circle">
                <i class="ni ni-paper-diploma text-lg opacitya-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h4 style="margin-left: 40%">My Daily Entries</h4>
          <a href="{{route('staff.viewentryrecords')}}" class="btn btn-dark">View All Daily Entries</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table table-striped table-bordered" id = "DOMContentLoaded">
              <thead class="thead-dark">
                  <tr>
                      <th>Staff Name</th>
                      <th>House</th>
                      <th>Patient Name</th>
                      <th>Date</th>
                      <th>Shift</th>
                      <th>Personal Care</th>
                      <th>Medication Admin</th>
                      <th>Appointments</th>
                      <th>Activities</th>
                      <th>Incident</th>
                      <th>Notes</th>
                      <th>Print Record</td>
                  </tr>
              </thead>
              <tbody>
                  @foreach($entries as $entry)
                      <tr>
                          <td>{{ $entry->user_name }}</td>
                          <td>{{ $entry->house }}</td>
                          <td>{{ $entry->client_name }}</td>
                          <td>{{ $entry->date }}</td>
                          <td>{{ $entry->shift }}</td>
                          <td>{{ $entry->personal_care }}</td>
                          <td>{{ $entry->medication_admin }}</td>
                          <td>{{ $entry->appointments }}</td>
                          <td>{{ $entry->activities }}</td>
                          <td>{{ $entry->incident }}</td>
                           <td>{{ $entry->comments}}</td>
                          <td>
                            <a href="{{ route('staff.view-record', ['id' => $entry->id]) }}" class = "btn btn-dark">Export To Pdf</a>
                        </td>              
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
            Powered with <i class="fa fa-heart"></i> by
            <a href="" class="font-weight-bold" target="_blank">Digital Evangelicals</a>
          
          </div>
        </div>
    
      </div>
    </div>
  </footer>
</div>
@endsection