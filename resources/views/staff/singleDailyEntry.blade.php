<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script>
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<div class="container" style="margin-top:100px;">
<button onclick="generatePDF()" class = "btn btn-info"><i class = "fa fa-print"></i>Generate PDF</button>
<a href= "/dashboard"  class = "btn btn-info"><i class = "fa fa-print"></i>Dashboard</a>
<hr>
<script>
    function generatePDF() {
        var doc = new jsPDF();
        // HTML content to be converted
        var htmlContent = document.getElementById('pdf-content').innerHTML; 
        doc.text('Single Daily Entry Report', 10, 10); // Title
        doc.fromHTML(htmlContent, 10, 20, {
            width: 190
        });
        // Save the PDF
        doc.save('SingleEntryReport.pdf');
    }
    </script>  
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Daily Entries</div>
                    <div class="card-body" id = "pdf-content">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>Date</th>
                                        <td>{{ $entry->date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shift</th>
                                        <td>{{ $entry->shift }}</td>
                                    </tr>
                                    <tr>
                                        <th>User Name</th>
                                        <td>{{ $entry->user_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Patient Name</th>
                                        <td>{{ $entry->patient_name }}</td>
                                    </tr>
                                    <!-- Add rows for other fields -->
                                    <tr>
                                        <th>Personal Care</th>
                                        <td>{{ $entry->personal_care }}</td>
                                    </tr>
                                    <tr>
                                        <th>Medication Admin</th>
                                        <td>{{ $entry->medication_admin }}</td>
                                    </tr>
                                    <tr>
                                        <th>Appointments</th>
                                        <td>{{ $entry->appointments }}</td>
                                    </tr>
                                    <tr>
                                        <th>Activities</th>
                                        <td>{{ $entry->activities }}</td>
                                    </tr>
                                    <tr>
                                        <th>Incident</th>
                                        <td>{{ $entry->incident }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $entry->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $entry->updated_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
