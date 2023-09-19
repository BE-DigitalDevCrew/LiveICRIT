Copy code
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate PDF</title>
</head>
<body>
    <h1>Generate PDF Example</h1>
    
    <button id="generateBtn">Generate PDF</button>
    
    <script>
        document.getElementById('generateBtn').addEventListener('click', function () {
            const entryId = <?php echo json_encode($entryId); ?>;
            const pdf = new jsPDF();
            
            pdf.text(10, 10, 'Generating PDF for Entry ID: ' + entryId);
            pdf.save('entry_' + entryId + '.pdf');
        });
    </script>
</body>
</html>