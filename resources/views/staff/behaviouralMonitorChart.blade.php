@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="/img/icritLogo.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                           Behavioural Monitor Chart
                        </h5>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    @if(Session::has('success'))
    <script type="text/javascript">
    function massge() {
    Swal.fire(
    'Success',
    'Behaviour Monitor Chart Saved'
        );
        }
        window.onload = massge;
    </script>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{ route('save-bChart') }}">
                    @csrf      
            <div class="form-group">
                        <label for="patient_id">Patient Name</label>
                        <select name="patient_id" id="patient_id" class="form-control" required>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->patient_name }}</option>
                            @endforeach
                        </select>
                    </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Date</label>
            <div class="col-md-12">
                <!-- Day, Month, and Year selects go here -->
                <input type="date" class="form-control" name="date" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Known Behaviours</label>
            <div class="col-md-12">
                <!-- Day, Month, and Year selects go here -->
                <input type="text" class="form-control" name="knownBehaviours" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Totals</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="totals" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Time</label>
            <div class="col-md-12">
                <!-- Day, Month, and Year selects go here -->
                <input type="time" class="form-control" name="time" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Known Behaviour Reference</label>
            <div class="col-md-12">
                <input type="text" class="form-control" name="knownBehaviourReference" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Comments/ additional detail if needed</label>
            <div class="col-md-12">
                <!-- Day, Month, and Year selects go here -->
                <input type="text" class="form-control" name="comments" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <!-- Day, Month, and Year selects go here -->
                <label for="injuries" class="col-md-2 col-form-label">Injuries sustained by anyone?</label>
                <select name="injuries" class = "form-control">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="date" class="col-md-2 col-form-label">Initials Of Person Completing Entry</label>
            <div class="col-md-12">
                <!-- Day, Month, and Year selects go here -->
                <input type="text" class="form-control" id="last_name" name="initials" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
                </form>
                </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
