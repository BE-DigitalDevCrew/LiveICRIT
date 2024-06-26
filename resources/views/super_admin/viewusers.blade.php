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
             
              <a href="{{route('admin.addusers')}}" class="btn btn-primary btn-sm ms-auto">Add User</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">User Information</p>
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                      <h6>Users table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                        @endif
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Use Name</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Role</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">House</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                              <th class="text-secondary opacity-7"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($users as $user)
                            <tr>
                              <td>
                                <div class="d-flex px-2 py-1">
                                  
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{$user->username}}</h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0">{{$user->email}}</p>
                              </td>
                              <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold">{{$user->type}}</span>
                              </td>
                              <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{$user->house_name}}</span>
                              </td>
                              <td><a href="{{ route('admin.users.approve', $user->id) }}"
                                class="btn btn-primary btn-sm">Approve</a>
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
                            @empty
                            <tr>
                                <td class="align-justified"  colspan="4">No users found.</td>
                            </tr>
                            @endforelse
                          </tbody>
                        </table>
                        @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
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