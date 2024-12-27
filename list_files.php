<?php
// Directory to list files from
$directory = "uploads/"; // Ensure this matches the directory in upload.php

// Check if the directory exists
if (is_dir($directory)) {
    $files = array_diff(scandir($directory), array('.', '..')); // Exclude . and .. from the list

    if (count($files) > 0) {
        echo json_encode(array_values($files)); // Output files as a JSON array
    } else {
        echo "No files found in the directory.";
    }
} else {
    echo "Error: Directory does not exist.";
}
?>
