<?php
include('dbcon.php');

if (isset($_GET['id'])){
$id=$_GET['id'];

$query = mysqli_query($conn,"select * from student where studentID='$id'") or die(mysqli_error());
$row = mysqli_fetch_array($query);
$fname=$row['FirstName'];
$lname=$row['LastName'];

mysqli_query($conn,"delete from student where studentID='$id'") or die(mysqli_error());
mysqli_query($conn,"INSERT INTO history (data,action,date,user)VALUES('$fname $lname', 'Delete Student', NOW(),'Admin')")or die(mysqli_error());

header('location:student_profiles.php');
}
?>