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
              <a class="btn btn-primary" href="{{ route('downloadFile', 'IcritUserManual.pdf') }}" type="button"><i class = "fa fa-download"></i>Download</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm text-center">Need Help Please Download Our User Manual</p>
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
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