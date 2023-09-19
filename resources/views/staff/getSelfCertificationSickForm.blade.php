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
                           Self Certification Sick Form
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
            'Saved'
                );
                }
                window.onload = massge;
                </script>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{ route('postSelfCertificationForm') }}">
                    @csrf
                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" name="job_title" id="job_title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="service_department">Service/Department</label>
                        <input type="text" name="service_department" id="service_department" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="absence_date">Absence Date(s)</label>
                        <input type="date" name="absence_date" id="absence_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="reason_of_absence">My Reason Of Absence Was</label>
                        <input type="text" name="reason_of_absence" id="reason_of_absence" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">I was absent due to an accident/incident at work</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="absent_due_to_accident" value="Yes" id="absent_yes">
                            <label class="form-check-label" for="absent_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="absent_due_to_accident" value="No" id="absent_no">
                            <label class="form-check-label" for="absent_no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">I consulted a medical practitioner</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="consulted_medical_practitioner" value="Yes" id="consulted_yes">
                            <label class="form-check-label" for="consulted_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="consulted_medical_practitioner" value="No" id="consulted_no">
                            <label class="form-check-label" for="consulted_no">No</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="medical_advice">The medical advice was as follows</label>
                        <textarea name="medical_advice" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="declaration">I declare that to the best of my knowledge the above information is accurate. I understand that if I knowingly make a false declaration, this may result in disciplinary action being taken which could result in my dismissal</label>
                        <textarea name="declaration" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="declaration_name">Declaration Name</label>
                        <input type="text" name="declaration_name" id="declaration_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="declaration_last_name">Declaration Last Name</label>
                        <input type="text" name="declaration_last_name" id="declaration_last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="declaration_date">Date</label>
                        <input type="date" name="declaration_date" id="declaration_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
