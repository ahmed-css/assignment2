<?php
$apiUrl = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

$apiResponse = file_get_contents($apiUrl);

$decodedData = json_decode($apiResponse, true);

if (!$decodedData || !isset($decodedData["results"])) {
    die("Error: Unable to fetch or process data from the API.");
}

$studentsData = $decodedData['results'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics of st UOB</title>
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
    <main>
        <h1>UoB students</h1>
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Program</th>
                    <th>Nationality</th>
                    <th>College</th>
                    <th>Number of Students</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Loop through each student record to populate the table rows
                foreach ($studentsData as $studentRecord) { 
                ?>
                <tr>
                    <td><?php echo $studentRecord["year"] ?? 'N/A'; ?></td>
                    <td><?php echo $studentRecord["semester"] ?? 'N/A'; ?></td>
                    <td><?php echo $studentRecord["the_programs"] ?? 'N/A'; ?></td>
                    <td><?php echo $studentRecord["nationality"] ?? 'N/A'; ?></td>
                    <td><?php echo $studentRecord["colleges"] ?? 'N/A'; ?></td>
                    <td><?php echo $studentRecord["number_of_students"] ?? 0; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>
