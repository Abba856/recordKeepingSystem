<?php
// Test database connection
$conn = mysqli_connect('localhost', 'root', '', 'hrms') or die(mysqli_error($conn));

if ($conn) {
    echo "Database connection successful!";
} else {
    echo "Database connection failed!";
}

// Check if student table exists
$table_check = mysqli_query($conn, "SHOW TABLES LIKE 'student'");
if (mysqli_num_rows($table_check) > 0) {
    echo "\nStudent table already exists.";
} else {
    echo "\nStudent table does not exist.";
}

mysqli_close($conn);
?>