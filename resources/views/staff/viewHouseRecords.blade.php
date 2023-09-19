@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="
https://cdn.jsdelivr.net/npm/jspdf@2.5.1/dist/jspdf.es.min.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
<script>
    <style>
    .pagination .page-link {
        border-radius: 0; /* Remove the default border-radius */
    }
</style>
     document.getElementById('export-pdf').addEventListener('click', function () {
            var doc = new jsPDF('p', 'pt', 'letter');
            var options = {
                pagesplit: true,
                margin: {
                    top: 60,
                    left: 40,
                    right: 40,
                    bottom: 40
                }
            };
            doc.fromHTML(document.getElementById('dailyEntryTable'), options);
            doc.save('daily_entry_results.pdf');
        });
    </script>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                   Welcome {{$name}}
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-user bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    Number Of Patients in house {{ $numberOfPatients[0]->count }}
                                    <h5 class="font-weight-bolder">
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-s bg-building gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                </div>
                            </div>
                            <div class="col-4 text-end"> 
                                <a href = "{{ route('allRecords') }}" class = "btn btn-info">View House Records</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="container" style="margin-top:200px;">
    <h1 class="text-center">Daily Entry Records</h1>
        <div class="table-responsive">
        <table class="table table-bordered"  id = "dailyEntryTable">
            <thead>
                <tr>
                    <th>User</th>
                    <th>House</th>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>Shift</th>
                    <th>Personal Care</th>
                    <th>Medication Admin</th>
                    <th>Appointments</th>
                    <th>Activities</th>
                    <th>Incident</th>
                    <th>View Record</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)
                <tr>
                    <td>{{ $entry->user_name }}</td>
                    <td>{{ $entry->house }}</td>
                    <td>{{ $entry->patient_name }}</td>
                    <td>{{ $entry->date }}</td>
                    <td>{{ $entry->shift }}</td>
                    <td>{{ $entry->personal_care }}</td>
                    <td>{{ $entry->medication_admin }}</td>
                    <td>{{ $entry->appointments }}</td>
                    <td>{{ $entry->activities }}</td>
                    <td>{{ $entry->incident }}</td>
                    <td><a href="{{ route('view-record', ['id' => $entry->id]) }}"class = "btn btn-info">View Record</a></td>      
                </tr>
                @endforeach
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($entries->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link" style="padding:30px;">Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $entries->previousPageUrl() }}" rel="prev">Previous</a>
                            </li>
                        @endif
                        
                        {{-- Next Page Link --}}
                        @if ($entries->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" style="padding:30px;" href="{{ $entries->nextPageUrl() }}" rel="next">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </tbody>
        </table>
      
        </div>
</div>
@include('layouts.footers.auth.footer')
</div>
@endsection
@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
