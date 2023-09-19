@extends('layouts.adminlayout')
@section('content')
<div class="container-fluid py-4">
  <div class="col-md-12 mt-4">
    <div class="card">
      <div class="card-header pb-0 px-3">
        <h6 class="mb-0">DailyEntry Information</h6>
      </div>
      <div class="card-body pt-4 p-3">
        <ul class="list-group">
          <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
            <div class="d-flex flex-column">
              <h6 class="mb-3 text-sm">Date</h6>
              <h6 class="mb-3 text-sm">Shift</h6>

              <h6 class="mb-3 text-sm">Patient</h6>
              <h6 class="mb-3 text-sm">Patient Care</h6>
              <h6 class="mb-3 text-sm">Activities</h6>
              <h6 class="mb-3 text-sm">Appointments</h6>
              <h6 class="mb-3 text-sm">Incident</h6>
            </div>
            <div class="ms-auto text-end">
              <h6 class="mb-3 text-sm">07/09/23</h6>
              <h6 class="mb-3 text-sm">Day</h6>

              <h6 class="mb-3 text-sm">Charles</h6>
              <h6 class="mb-3 text-sm">Day Care</h6>
              <h6 class="mb-3 text-sm">Walking</h6>
              <h6 class="mb-3 text-sm">Yes</h6>
              <h6 class="mb-3 text-sm">None</h6>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>  
@endsection