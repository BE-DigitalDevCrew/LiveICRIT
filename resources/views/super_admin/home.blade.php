@extends('layouts.adminlayout')
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
                <p class="mb-1 pt-2 text-bold" style="margin-left: 5%"> <strong> Welcome , <span> <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->username }}
              </a></span> </strong> </p>
                <a class="text-dark font-weight-bold ps-1 mb-0 icon-move-left mt-auto" href="javascript:;">
                  
                </a>
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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">SYSTEM USERS</p>
                <h5 class="font-weight-bolder">
                  10
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> Available <br> users</span>
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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">STAFF</p>
                <h5 class="font-weight-bolder">
                  25
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> Available <br> staff</span>
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
                  8
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> Available <br> houses</span>
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
                  5 
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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">PATIENTS</p>
                <h5 class="font-weight-bolder">
                  25
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
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">APPROVED PATIENTS</p>
                <h5 class="font-weight-bolder">
                  8
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> All <br> approved</span>
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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">PENDING APPROVAL</p>
                <h5 class="font-weight-bolder">
                    2
                </h5>
                <p class="mb-0">
                  <span class="text-warning text-sm font-weight-bolder"> All <br> pending</span>
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