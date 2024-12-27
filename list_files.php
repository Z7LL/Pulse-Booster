<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Directory to list files from
$directory = "uploads/"; // Ensure this matches the directory in upload.php

// Set the content type to JSON
header('Content-Type: application/json');

// Check if the directory exists
if (is_dir($directory)) {
    $files = array_diff(scandir($directory), array('.', '..')); // Exclude . and .. from the list

    if (count($files) > 0) {
        // Output files as a JSON array
        echo json_encode(array_values($files));
    } else {
        // If no files are found, output a JSON error message
        echo json_encode(["message" => "No files found in the directory."]);
    }
} else {
    // If the directory doesn't exist, output a JSON error message
    echo json_encode(["error" => "Directory does not exist."]);
}
?>
