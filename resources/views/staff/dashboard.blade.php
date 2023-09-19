@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">  
function generate() {  
    var doc = new jsPDF('p', 'pt', 'letter');  
    var htmlstring = '';  
    var tempVarToCheckPageHeight = 0;  
    var pageHeight = 0;  
    orientation: "landscape";
    unit: "in";
    format: [4, 2];
    pageHeight = doc.internal.pageSize.height;  
    specialElementHandlers = {  
        // element with id of "bypass" - jQuery style selector  
        '#bypassme': function(element, renderer) {  
            // true = "handled elsewhere, bypass text extraction" 
            return true  
        }  
    };  
    margins = {  
        top: 150,  
        bottom: 60,  
        left: 40,  
        right: 40,  
        width: 600  
    };  
    var y = 20;  
    doc.setLineWidth(2);  
    doc.text(200, y = y + 30, "Daily Entry");  
    doc.autoTable({  
        html: '#simple_table',  
        startY: 70,  
        theme: 'grid',  
        columnStyles: {  
            0: {  
                cellWidth: 250,  
            },  
            1: {  
                cellWidth: 250,  
            },  
            2: {  
                cellWidth: 250,  
            }  
        },  
        styles: {  
            minCellHeight: 80  
        }  
    })  
    doc.save('Daily Entry Reports.pdf');  
}  
</script>
<script>
  <script>
    $(document).ready(function () {
        $('.export-pdf-btn').click(function (e) {
            e.preventDefault();
            
            var entryId = $(this).data('entry-id');
            
            // Make an AJAX request to fetch data
            $.ajax({
                url: '/generate-pdf/' + entryId,
                method: 'GET',
                success: function (data) {
                    generatePDF(data);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
        
        function generatePDF(data) {
            var pdf = new jsPDF();
            
            pdf.text(10, 10, 'User: ' + data.user_name);
            pdf.text(10, 20, 'House: ' + data.house);
            // Add more fields as needed
            
            pdf.save('entry_' + data.entryId + '.pdf');
        }
    });
</script>
</script>   
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                               Welcome {{$name}} 
                               <hr>
                               Your House is {{$house}}
                               <p>Current Date: {{ $currentDate }}</p>
                            </div>
                          
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-user text-center rounded-circle">
                                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                Number Of Patients in house {{ $numberOfPatients[0]->count }}
                                <!--<a href = "viewMyProfile" class = "btn btn-info">View Your Profile</a>!-->
                                <a href = "viewMyPatients" class = "btn btn-danger">View Your Patients</a>
                                <h5 class="font-weight-bolder">
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-s bg-building gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-briefcase-24 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!--<div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <img src="./img/icritLogo.png" alt="main_logo" style="height:100px;">
                                </div>
                            </div>
                            <div class="col-4 text-end"> 
                                <a href="{{ route('allRecords') }}" class="btn btn-primary">View House Records Fam</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>!-->
    </div>
</div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/phpYC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <div class="container">
    <a class="navbar-brand" class = "btn btn-info"></a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center" style="size: 22px;">Daily Entries</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id = "DOMContentLoaded">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>User Name</th>
                                        <th>House</th>
                                        <th>Patient Name</th>
                                        <th>Date</th>
                                        <th>Shift</th>
                                        <th>Personal Care</th>
                                        <th>Medication Admin</th>
                                        <th>Appointments</th>
                                        <th>Activities</th>
                                        <th>Incident</th>
                                        <th>Print Record</td>
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
                                            <td><a href="{{ route('view-record', ['id' => $entry->entryId]) }}"class = "btn btn-info">View Record</a></td>                   
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
