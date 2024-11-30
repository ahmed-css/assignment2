<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// API URL
$url = "https://data.gov.bh/api/records/1.0/search/?dataset=01-statistics-of-students-nationalities_updated&q=&rows=100";

// Fetch the API response
$response = file_get_contents($url);

// Check for errors
if ($response === false) {
    die("Error: Unable to fetch data from API.");
}

// Decode the JSON response
$data = json_decode($response, true);

// Check for JSON decoding errors
if ($data === null) {
    die("Error: Unable to decode JSON data.");
}

// Extract records
$records = $data['records'] ?? [];
?>
