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
              <p class="mb-0"></p>
              <a href="{{route('staff.viewsupportplan')}}" class="btn btn-primary btn-sm ms-auto">View Support Plans</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Support Plan Information</p>
            <hr>
            <div class="row">
                <form method="POST" action="{{ route('staff.addsupportplan') }}">
                    @csrf
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="patient_id">Patient</label>
                        <select name="patient_id"  class="form-control" required>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->patient_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Communication Skills</label>
                        <textarea type="text" rows="5" name="comm_skills"  class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Friendships and Personal Relationships, in my friendship groups, family and with the people that supports me. To include sexuality and sexual relationships</label>
                        <textarea type="text" rows="5" name="friend_fam"  class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Mobility and dexterity</label>
                        <textarea type="text" rows="5" name="mobility_dexterity"  class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Routines and Personal care (morning, afternoon, evening, and night)</label>
                        <textarea type="text" rows="5" name="routines_personal_care"  class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Needs around using the toilet and maintaining my personal hygiene</label>
                        <textarea type="text" rows="5" name="needs"  class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Emotions (what may upset me or me anxious.)</label>
                        <textarea type="text" rows="5" name="emotions"  class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Accessing the Community and daily living skills</label>
                        <textarea type="text" rows="5" name="daily_living_skills"  class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">My General Health Needs – you may need to include additional support plans for any specifically identified needs.</label>
                        <textarea type="text" rows="5" name="general_health_needs"  class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">My Medication Support</label>
                        <textarea type="text" rows="5" name="medication_support"  class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Recreation and relationt</label>
                        <textarea type="text" rows="5" name="recreation_and_relation" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Eating, Drinking and Nutrition</label>
                        <textarea type="text" rows="5" name="eating_drinking_nutrition" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Psychological Support and Mental Health Needs</label>
                        <textarea type="text" rows="5" name="pSupport" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Finance (also ensure you put a financial passport in place for me)</label>
                        <textarea type="text" rows="5" name="finance" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Staff Email</label>
                        <input type="email"  name="staff_email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Support Plan</button>
                    </div>
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