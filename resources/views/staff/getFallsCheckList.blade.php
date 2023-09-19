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
                           Falls Checklist
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
                'success',
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
                <form method="POST"  action="{{ route('saveFallsChecklist') }}">
                    @csrf
                    <div class="form-group">
                        <label for="patient_id">Patient Name</label>
                        <select name="patient_id" id="patient_id" class="form-control" required>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->patient_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="incident_ref">Incident Ref</label>
                        <input type="text" name="incident_ref" id="incident_ref" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="completed_by">Completed By</label>
                        <input type="text" name="completed_by" id="completed_by" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Does this person we support have a health concern that requires immediate attention in the event of a fall?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="health_concern" value="Yes" id="health_concern_yes">
                            <label class="form-check-label" for="health_concern_yes">Yes, Immediate Attention Required</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="health_concern" value="No" id="health_concern_no">
                            <label class="form-check-label" for="health_concern_no">No, No Immediate Health Concern</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="personal_care">Personal Care Required</label>
                        <select name="personal_care" id="personal_care" class="form-control" required>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Is the person breathing normally?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="breathing" value="Yes" id="breathing_yes">
                            <label class="form-check-label" for="breathing_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="breathing" value="No" id="breathing_no">
                            <label class="form-check-label" for="breathing_no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Have they suffered a head injury?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="head_injury" value="Yes" id="head_injury_yes">
                            <label class="form-check-label" for="head_injury_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="head_injury" value="No" id="head_injury_no">
                            <label class="form-check-label" for="head_injury_no">No</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="head_injury" value="Minor" id="head_injury_minor">
                            <label class="form-check-label" for="head_injury_minor">Minor Head Injury</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Has the person fallen from a height greater than 1 metre?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fall_distance" value="Yes" id="fall_distance_yes">
                            <label class="form-check-label" for="fall_distance_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fall_distance" value="No" id="fall_distance_no">
                            <label class="form-check-label" for="fall_distance_no">No</label>
                        </div>
                    </div>
                    <!-- Additional questions -->
                    <div class="mb-3">
                        <label class="form-label">Do you suspect that they have suffered a serious injury i.e. fracture or dislocation?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="serious_injury_suspected" value="Yes" id="serious_injury_yes">
                            <label class="form-check-label" for="serious_injury_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="serious_injury_suspected" value="No" id="serious_injury_no">
                            <label class="form-check-label" for="serious_injury_no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Are they bleeding or do they have a skin tear?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bleeding_or_skin_tear" value="Yes" id="bleeding_or_skin_tear_yes">
                            <label class="form-check-label" for="bleeding_or_skin_tear_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bleeding_or_skin_tear" value="No" id="bleeding_or_skin_tear_no">
                            <label class="form-check-label" for="bleeding_or_skin_tear_no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Are they experiencing any pain (different to what is usual to them)?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="unusual_pain" value="Yes" id="unusual_pain_yes">
                            <label class="form-check-label" for="unusual_pain_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="unusual_pain" value="No" id="unusual_pain_no">
                            <label class="form-check-label" for="unusual_pain_no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Are they able to weight bear if you proceed with a manual maneuver?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="weight_bear" value="Yes" id="weight_bear_yes">
                            <label class="form-check-label" for="weight_bear_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="weight_bear" value="No" id="weight_bear_no">
                            <label class="form-check-label" for="weight_bear_no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Are you recommending the attendance of a GP or Ambulance?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="recommend_attendance" value="Yes" id="attendance_yes">
                            <label class="form-check-label" for="attendance_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="recommend_attendance" value="No" id="attendance_no">
                            <label class="form-check-label" for="attendance_no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">If you are satisfied that it is safe and appropriate to proceed with moving and handling techniques, can the hoist be used?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="use_hoist" value="Yes" id="hoist_yes">
                            <label class="form-check-label" for="hoist_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="use_hoist" value="No" id="hoist_no">
                            <label class="form-check-label" for="hoist_no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hoist Not Used due to lack of space</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hoist_not_used_space" value="Yes" id="hoist_space_yes">
                            <label class="form-check-label" for="hoist_space_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hoist_not_used_space" value="No" id="hoist_space_no">
                            <label class="form-check-label" for="hoist_space_no">No</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comments_space">Comments to lack of space</label>
                        <input type="text" name="comments_space" id="comments_space" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hoist Not Used due to personal dignity</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hoist_not_used_dignity" value="Yes" id="hoist_dignity_yes">
                            <label class="form-check-label" for="hoist_dignity_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hoist_not_used_dignity" value="No" id="hoist_dignity_no">
                            <label class="form-check-label" for="hoist_dignity_no">No</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comments_dignity">Comments to personal dignity</label>
                        <input type="text" name="comments_dignity" id="comments_dignity" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="comments_position">Comments to dangerous position</label>
                        <input type="text" name="comments_position" id="comments_position" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="comments_other">Add Any Other Comments to the above</label>
                        <input type="text" name="comments_other" id="comments_other" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">If moved, was a handling belt used?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="handling_belt_used" value="Yes" id="handling_belt_yes">
                            <label class="form-check-label" for="handling_belt_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="handling_belt_used" value="No" id="handling_belt_no">
                            <label class="form-check-label" for="handling_belt_no">No</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comments_belt">Comments to handling belt usage</label>
                        <input type="text" name="comments_belt" id="comments_belt" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Has the level of pain altered during the maneuver?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pain_altered" value="Yes" id="pain_altered_yes">
                            <label class="form-check-label" for="pain_altered_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pain_altered" value="No" id="pain_altered_no">
                            <label class="form-check-label" for="pain_altered_no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">If the person we support is normally able to walk, are they now able to stand from a chair and walk several steps?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="able_to_walk" value="Yes" id="able_to_walk_yes">
                            <label class="form-check-label" for="able_to_walk_yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="able_to_walk" value="No" id="able_to_walk_no">
                            <label class="form-check-label" for="able_to_walk_no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Is there an obvious immediate cause to the fall?</label>
                        <select class="form-select" name="immediate_cause">
                            <option value="Defective premises">Defective premises</option>
                            <option value="Poor layout of premises">Poor layout of premises</option>
                            <option value="Poor housekeeping">Poor housekeeping</option>
                            <option value="Medication/ Fatigue/ Alcohol">Medication/ Fatigue/ Alcohol</option>
                            <option value="Health related">Health related</option>
                            <option value="Behaviour Related">Behaviour Related</option>
                            <option value="Lack of suitable supervision">Lack of suitable supervision</option>
                            <option value="Lack of training/ knowledge/ skill">Lack of training/ knowledge/ skill</option>
                            <option value="Other">Other (Please state)</option>
                        </select>
                    </div>
                    <p>You may be asked to complete a witness statement.</p>                    
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
