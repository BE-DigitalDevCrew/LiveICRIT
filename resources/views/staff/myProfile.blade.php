@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                    <img src="img/icritLogo.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            Add Patient
                        </h5>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('savePatient') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <h5 class = "text-center">Select A House</h5>
                        <br>
                        <select name="house" class = "form-control">
                            <option value="hearten">Hearten</option>
                            <option value="lorraine">Lorraine</option>
                            </select>
                        {{-- Dropdown to select the associated user --}}
                        <div class="form-group">
                            <label for="user_id">Associated User</label>
                            <select name="Staff_Id" id="user_id" class="form-control" required>
                                @foreach ($patients as patient)
                                    <option value="{{ $patient->id }}">{{ $patient->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Patient</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>     
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
