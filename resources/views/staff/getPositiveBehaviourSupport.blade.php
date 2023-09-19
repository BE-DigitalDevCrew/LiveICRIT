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
                           Positive Behaviour Support
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
                <form method="POST" action="{{ route('savePositiveBPlan') }}">
                    @csrf
                    <div class="form-group">
                        <label for="patient_name">Patient Name</label>
                        <select name="patient_id" id="patient_id" class="form-control" required>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->patient_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="todays_date">Today's Date</label>
                        <input type="date" class="form-control" id="todays_date" name="todays_date" required>
                    </div>
                    <div class="form-group">
                        <label for="review_date">Review Date</label>
                        <input type="date" class="form-control" id="review_date" name="review_date" required>
                    </div>
                    <div class="form-group">
                        <label for="home_location">Home/Location</label>
                        <input type="text" class="form-control" id="home_location" name="home_location" required>
                    </div>
                    <div class="form-group">
                        <label for="street_address">Street Address</label>
                        <input type="text" class="form-control" id="street_address" name="street_address" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="county">County</label>
                        <input type="text" class="form-control" id="county" name="county" required>
                    </div>
                    <div class="form-group">
                        <label for="completed_by">Completed By</label>
                        <input type="text" class="form-control" id="completed_by" name="completed_by" required>
                    </div>
                    <div class="form-group">
                        <label for="behaviors_when_happy_angry">What I do when I am happy or angry (BEHAVIORS)</label>
                        <textarea type="text" rows="5" class="form-control" id="behaviors_when_happy_angry" name="behaviors_when_happy_angry" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="triggers">What Makes me unhappy or angry? (TRIGGERS)</label>
                        <textarea type="text" rows="5" class="form-control" id="triggers" name="triggers" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="personal_care">Actions NEVER to take when supporting me</label>
                        <textarea type="text" rows="5" class="form-control" id="last_name" name="actions" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="personal_care">Behaviour- How I look when I am Calm relaxed</label>
                        <textarea type="text" rows="5" class="form-control" id="last_name" name="behaviour_calm" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="personal_care">Support Strategies The things staff can do to keep me in the green</label>
                        <textarea type="text" rows="5" class="form-control" id="last_name" name="support" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="personal_care">Behaviour- How I look when I am becoming anxious or aroused</label>
                        <textarea type="text" rows="5" class="form-control" id="last_name" name="behaviour_relaxed" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="personal_care">Support Strategies The things staff can say or do to manage the situation and prevent unnecessary distress, injury and destruction.</label>
                        <textarea type="text" rows="5" class="form-control" id="last_name" name="support_strategies" required></textarea>
                    </div>
                    <h6 for="date" class="text-center">Recovery Period
                        Please ensure this section is maintained up to date and is accurately reflected across the support & Risk Management Plan</h6>
                        <div class="form-group">
                            <label for="personal_care">Support Strategies The things staff can say or do to manage the situation and prevent unnecessary distress, injury and destruction.</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="recovery_period" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">Behaviour- How I look and behave when I am in crisis</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="behaviour_crisis" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">Form(I.e. tablet/ liquid):</label>
                            <input type="text" class="form-control" id="last_name" name="tablet_liquid" required>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">Strength:</label>
                            <input type="text" class="form-control" id="last_name" name="strength" required>
                        </div>
                        <div class="form-group">
                            <label for="route_admin">Route of Administration</label>
                            <input type="text" class="form-control" id="route_admin" name="route_admin" required>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">Dose & intervals to be administered:</label>
                            <input type="text" class="form-control" id="last_name" name="dose_intervals" required>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">Maximum dose in 24 hours:</label>
                            <input type="text" class="form-control" id="last_name" name="dose_max" required>
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
                            <label for="personal_care">Special Instructions</label>
                            <input type="text" class="form-control" id="last_name" name="special_instructions" required>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">*Reasons for Administration and When Should the Medication be Given(Required)s</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="reasons_admin" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">Name Of Medicine</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="name_medicine" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">
                                Form(I.e. tablet/ liquid):</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="tablet_liquid" required></textarea>
                        </div>
                        <div class="orm-group">
                            <label for="personal_care">
                                Strength:</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="strength" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">
                               Route of Administration</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="admin_role" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">
                            Dose & intervals to be administered:</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="dose_intervals" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">
                                Maximum dose in 24 hours:</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="max_dose" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Is Medication:</label>
                            <select class="form-select" name="medication">
                                <option value="Prescribed">Prescribed</option>
                                <option value="Over The Counter">Over The Counter</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">
                                Reasons for Administration and When Should the Medication be Given(Required)</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="reasons_for_admin" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">
                                Describe in as much detail as possible the condition being treated i.e. symptoms, indicators, behaviour/s, triggers, type of pain/s where? When ? Etc.</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="condition" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">
                                History of Previous Interventions and / or practice</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="history" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">
                                List any documentation and evidence that informs this positive Behaviour Support Plan
                            </label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="documentation" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">
                                How will future occurrences be recorded & managed into this positive Behaviour Support plan
                            </label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="personal_care" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">
                                Views of Family / associates that have been considered as part of this assessment
                            </label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="family_views" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="personal_care">
                                Views of the Person we support
                            </label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="person_views" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Taking the attached information into consideration, have all the controls identified been agreed by all parties involved in consultation?</label>
                            <select class="form-select" name="controls_agreed">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Has Deprivation of Liberty Application been made?</label>
                            <select class="form-select" name="deprivation_of_liberty">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <h5 class = "text-center">This Positive Behaviour Support Plan has been agreed and acknowledged by</h5>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="name_aknowledged" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Position/ Role</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="position" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Role</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="role" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Staff Email</label>
                            <textarea type="text" rows="5" class="form-control" id="last_name" name="staff_email" required></textarea>
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
