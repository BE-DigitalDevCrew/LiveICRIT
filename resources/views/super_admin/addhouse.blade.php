@extends('layouts.adminlayout')
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
              <p class="mb-0">House Profile</p>
              <a href="{{route('admin.viewhouses')}}" class="btn btn-primary btn-sm ms-auto">View Houses</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">House Information</p>
            <div class="row">
                <form  action="{{route('admin.addhouse')}}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">House Name</label>
                          <input class="form-control" type="text"  name="house_name" id="house_name" required>
                        </div>
                      </div>
                   
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Head of House</label>
                              <input class="form-control" type="text" name="house_head" id="house_head" required>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">House Capacity</label>
                            <input class="form-control" type="text" name="capacity" id="capaciy" required>
                          </div>
                        </div>
                  </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="example-text-input" class="form-control-label">Status</label>
                               <select class="form-control" name="status" id="status">
                                <option class="form-group" value="Active"> Active</option>
                                <option class="form-group" value="Not-Active"> Not Active</option>
                               </select>
                            </div>
                          </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Add House</button>
                </form>
            
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