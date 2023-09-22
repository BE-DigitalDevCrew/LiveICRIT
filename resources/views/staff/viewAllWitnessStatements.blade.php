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
              <!--<a href="{{route('staff.addincidencereport')}}" class="btn btn-primary btn-sm ms-auto">View Complaint Records</a>!-->
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm text-center">Witness Statements</p>
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-0">
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Ref Number</th>
                                    <th>Injured Person</th>
                                    <th>Date of Accident</th>
                                    <th>Time of Accident</th>
                                    <th>Witness DOB</th>
                                    <th>Witness Home Address</th>
                                    <th>Street Address</th>
                                    <th>City</th>
                                    <th>County</th>
                                    <th>Telephone Number</th>
                                    <th>FitzRoy Employee</th>
                                    <th>Occupation</th>
                                    <th>What Happened</th>
                                    <th>Position</th>
                                    <th>Description of Accident</th>
                                    <th>Where Were You Positioned</th>
                                    <th>Any Other Information</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statements as $statement)
                                    <tr>
                                        <td>{{ $statement->username }}</td>
                                        <td>{{ $statement->ref_number }}</td>
                                        <td>{{ $statement->injured_person }}</td>
                                        <td>{{ $statement->date_of_accident }}</td>
                                        <td>{{ $statement->time_of_accident }}</td>
                                        <td>{{ $statement->witness_dob }}</td>
                                        <td>{{ $statement->witness_homeaddress }}</td>
                                        <td>{{ $statement->street_address }}</td>
                                        <td>{{ $statement->city }}</td>
                                        <td>{{ $statement->county }}</td>
                                        <td>{{ $statement->tel_number }}</td>
                                        <td>{{ $statement->fitzRoyEmployee }}</td>
                                        <td>{{ $statement->occupation }}</td>
                                        <td>{{ $statement->what_happened }}</td>
                                        <td>{{ $statement->position }}</td>
                                        <td>{{ $statement->description_accident }}</td>
                                        <td>{{ $statement->where_were_you_positioned }}</td>
                                        <td>{{ $statement->any_other_information }}</td>
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