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
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                               
                               <hr>
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
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                              
                                <a href = "viewMyProfile" class = "btn btn-info">View Your Profile</a>
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
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <img src="./img/icritLogo.png" alt="main_logo" style="height:100px;">
                                </div>
                            </div>
                            <div class="col-4 text-end"> 
                                <a href="{{ route('allRecords') }}" class="btn btn-primary">View House Records</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/phpYC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <div class="container">
    <a class="navbar-brand" class = "btn btn-info">Dashboard</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center" style="size: 22px;">Hospital Passports</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Patient Name</th>
                                        <th>DOB</th>
                                        <th>Likes to Be Known As</th>
                                        <th>NHS Number</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>County</th>
                                        <th>Country</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>My Support Care Needs</th>
                                        <th>My Carer Speaks</th>
                                        <th>Things to Know</th>
                                        <th>Religious Needs</th>
                                        <th>Ethnicity</th>
                                        <th>GP Name</th>
                                        <th>GP Address</th>
                                        <th>GP City</th>
                                        <th>GP County</th>
                                        <th>GP Other Services</th>
                                        <th>GP Social Worker</th>
                                        <th>GP Allergies</th>
                                        <th>GP Medical Interventions</th>
                                        <th>GP Cardiovascular</th>
                                        <th>GP Risk of Choking</th>
                                        <th>GP Current Medication</th>
                                        <th>GP Medical History</th>
                                        <th>GP Anxious</th>
                                        <th>How to Communicate</th>
                                        <th>How I Medicate</th>
                                        <th>How You Know I'm in Pain</th>
                                        <th>Moving Around</th>
                                        <th>Personal Care</th>
                                        <th>Seeing/Hearing</th>
                                        <th>How I Eat</th>
                                        <th>How I Keep Safe</th>
                                        <th>How I Use the Toilet</th>
                                        <th>Sleeping Pattern</th>
                                        <th>Things I Like</th>
                                        <th>Things I Dislike</th>
                                        <th>Additional Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hospitalPassports as $hospitalPassport)
                                        <tr>
                                            <td>{{ $hospitalPassport->user_name }}</td>
                                            <td>{{ $hospitalPassport->patient_name }}</td>
                                            <td>{{ $hospitalPassport->dob }}</td>
                                            <td>{{ $hospitalPassport->likes_to_be_known }}</td>
                                            <td>{{ $hospitalPassport->nhs_number }}</td>
                                            <td>{{ $hospitalPassport->address }}</td>
                                            <td>{{ $hospitalPassport->city }}</td>
                                            <td>{{ $hospitalPassport->county }}</td>
                                            <td>{{ $hospitalPassport->country }}</td>
                                            <td>{{ $hospitalPassport->phone_number }}</td>
                                            <td>{{ $hospitalPassport->email }}</td>
                                            <td>{{ $hospitalPassport->my_support_care_needs }}</td>
                                            <td>{{ $hospitalPassport->my_carer_speaks }}</td>
                                            <td>{{ $hospitalPassport->things_to_know }}</td>
                                            <td>{{ $hospitalPassport->religious_needs }}</td>
                                            <td>{{ $hospitalPassport->ethnicity }}</td>
                                            <td>{{ $hospitalPassport->gp_name }}</td>
                                            <td>{{ $hospitalPassport->gp_address }}</td>
                                            <td>{{ $hospitalPassport->gp_city }}</td>
                                            <td>{{ $hospitalPassport->gp_county }}</td>
                                            <td>{{ $hospitalPassport->gp_other_services }}</td>
                                            <td>{{ $hospitalPassport->gp_social_worker }}</td>
                                            <td>{{ $hospitalPassport->gp_allergies }}</td>
                                            <td>{{ $hospitalPassport->gp_medical_interventions }}</td>
                                            <td>{{ $hospitalPassport->gp_cardio_vascular }}</td>
                                            <td>{{ $hospitalPassport->gp_risk_of_chocking }}</td>
                                            <td>{{ $hospitalPassport->gp_current_medication }}</td>
                                            <td>{{ $hospitalPassport->gp_mymedicalhistory }}</td>
                                            <td>{{ $hospitalPassport->gp_anxious }}</td>
                                            <td>{{ $hospitalPassport->how_to_comm }}</td>
                                            <td>{{ $hospitalPassport->how_i_medicate }}</td>
                                            <td>{{ $hospitalPassport->how_you_know_pain }}</td>
                                            <td>{{ $hospitalPassport->moving_around }}</td>
                                            <td>{{ $hospitalPassport->person_care }}</td>
                                            <td>{{ $hospitalPassport->seeing_hearing }}</td>
                                            <td>{{ $hospitalPassport->how_i_eat }}</td>
                                            <td>{{ $hospitalPassport->how_i_keep_safe }}</td>
                                            <td>{{ $hospitalPassport->how_i_toilet }}</td>
                                            <td>{{ $hospitalPassport->sleeping_pattern }}</td>
                                            <td>{{ $hospitalPassport->likes }}</td>
                                            <td>{{ $hospitalPassport->dislike }}</td>
                                            <td>{{ $hospitalPassport->additional_info }}</td>
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
