<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B.E Care Management System</title>
    
    <!-- Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- splash-screen CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/splash-screen@4.0.1/dist/splash-screen.min.css" rel="stylesheet">

    <!-- Custom CSS for styling -->
    <style>
        body {
            background-color: #f4f5f7;
        }

        .splash-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Vertically center the content */
        }

        /* Customize the video container */
        #splash-video {
            width: 100%; /* Make the video responsive */
            max-width: 800px; /* Adjust the max-width as needed */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* Add a shadow */
        }

        /* Customize the jumbotron */
        .custom-jumbotron {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <style>
    .custom-jumbotron {
        background-color: #007BFF; /* Background color */
        color: #fff; /* Text color */
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* Shadow */
    }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="custom-jumbotron text-center">
                    <h1>Welcome To B-E Care Management System</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="splash-container" style="margin-right: -100px">
        <video autoplay muted loop id="splash-video">
            <source src="{{ asset('videos/be.mp4') }}" type="video/mp4">
        </video>
    </div>

    <!-- Bootstrap JavaScript and jQuery from CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.min.js"></script>

    <script>
        // Hide the splash screen when the video ends and redirect
        var video = document.getElementById("splash-video");
        video.addEventListener("ended", function () {
            document.querySelector(".splash-container").style.display = "none";
            window.location.href = "{{ route('login') }}";
        });

        // Automatically hide the splash screen after 11 seconds
        setTimeout(function () {
            document.querySelector(".splash-container").style.display = "none";
            window.location.href = "{{ route('login') }}";
        }, 5000); // 11,000 milliseconds = 11 seconds
    </script>
    
    <!-- Jumbotron with a label -->
    
</body>
</html>