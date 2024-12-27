<?php
// Directory to store uploaded files
$targetDir = "uploads/"; // Make sure the "uploads" directory exists and is writable

// Check if a file is uploaded
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $targetFile = $targetDir . basename($_FILES['file']['name']);
    
    // Check for file upload errors
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        // Move the file to the target directory
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
            echo "File uploaded successfully: " . htmlspecialchars($_FILES['file']['name']);
        } else {
            echo "Error: Unable to move the uploaded file.";
        }
    } else {
        echo "Error: File upload error code " . $_FILES['file']['error'];
    }
} else {
    echo "Error: No file uploaded.";
}
?>
