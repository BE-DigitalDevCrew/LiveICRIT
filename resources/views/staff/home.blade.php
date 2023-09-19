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
                <p class="mb-1 pt-2 text-bold" style="margin-left: 5%"> <strong> Your house is , <span> {{ Auth::user()->house_name }}</span> </strong> </p> 
              
              </div>
            </div>
            <div class="col-lg-4 me-auto ms-0 text-center">
              <div class="bg-gradient-primary border-radius-lg min-height-200">
                <img src="../../img/shapes/waves-white.svg" class="position-absolute h-100 top-0 d-md-block d-none" alt="waves">
                <div class="position-relative pt-5 pb-4">
                  <img class="max-width-500 w-100 position-relative z-index-2" src="{{asset('img/icritLogo.png')}}" 
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
                  10
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
                  9
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> Available <br> patients</span>
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
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h4 style="margin-left: 40%">Daily Entries Table</h4>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                    
                   
                    <th>Patient Name</th>
                    <th>Activities</th>
                    <th>Medication Admin</th>
                    <th>Incident</th>
                    <th>Appointment</th>
                    <th>Personal Care</th>
                    <th>Date</th>
                   
                   
                 
                   
                    <th>Incident</th>
                    <th>Action</td>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($entries as $patient)
                <tr>
               
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{$patient->patient_name}}</p>
                    
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{$patient->shift}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$patient->activities}}</span>
                  </td>
                 
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{$patient->medication_admin}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$patient->incident}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$patient->appointments}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$patient->personal}}</span>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{$patient->date}}</p> 
                  </td>
                  <td class="align-justified">
                    <div class="row">
                      <div class="col-md-6">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          <i class="fa fa-edit"></i> Edit
                        </a>
                      </div>
                      <div class="col-md-6">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          <i class="fa fa-trash"></i> Remove
                        </a>
                      </div>
                    </div>
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