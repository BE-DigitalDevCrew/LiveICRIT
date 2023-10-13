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
              <p class="mb-0">User Profile</p>
              <a href="{{route('admin.viewclients')}}" class="btn btn-primary btn-sm ms-auto">View Clients</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Client Information</p>
            <div class="row">
                <form  action="{{route('admin.addclient')}}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Client name</label>
                          <input class="form-control" type="text"  name="client_name" id="client_name" required>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Client surname</label>
                        <input class="form-control" type="text"  name="surname" id="surname" required>
                    </div>
                  </div>
                 
                   
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Client DOB</label>
                        <input class="form-control" type="date"  name="dob" id="dob" required>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Client ID Number</label>
                          <input class="form-control" type="text"  name="user_nat_id" id="user_nat_id" required>
                        </div>
                      </div>
                      </div>
                    <div class="row">
                        <div class="col-md-6">
                          <label for="example-text-input" class="form-control-label">Client House Name</label>
                          <select class="form-control" name="house_name" id="house_name">
                            @if ($houses)
                                @foreach($houses as $house)
                                    <option class="form-group" value="{{$house->house_name}}">{{ $house->house_name}} </option>
                                @endforeach
                            @endif
                          </select>
                          </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="example-text-input" class="form-control-label">Client Address</label>
                        <input class="form-control" type="address"  name="address" id="address" required>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="example-text-input" class="form-control-label">Client Phone-number</label>
                        <input class="form-control" type="phone_number"  name="phone_number" id="phone_number" required>
                        </div>
                    </div>
                 <br>
                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Add Client</button>
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