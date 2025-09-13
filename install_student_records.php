<!DOCTYPE html>
<html>
<head>
    <title>Student Records Installation</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="span12">
                <h2>Student Records Installation</h2>
                <?php
                if (isset($_POST['install'])) {
                    include('dbcon.php');
                    
                    // Create student table
                    $sql = "CREATE TABLE IF NOT EXISTS `student` (
                      `studentID` int(11) NOT NULL AUTO_INCREMENT,
                      `Student_No` varchar(50) NOT NULL,
                      `LastName` varchar(50) NOT NULL,
                      `FirstName` varchar(50) NOT NULL,
                      `MiddleName` varchar(50) NOT NULL,
                      `Sex` varchar(10) NOT NULL,
                      `Date_of_Birth` varchar(50) NOT NULL,
                      `birth_place` varchar(100) NOT NULL,
                      `civil_status` varchar(50) NOT NULL,
                      `citizenship` varchar(50) NOT NULL,
                      `height` varchar(3) NOT NULL,
                      `weight` varchar(5) NOT NULL,
                      `blood_type` varchar(10) NOT NULL,
                      `Residential_Address` varchar(100) NOT NULL,
                      `ZIP_CODE` varchar(20) NOT NULL,
                      `Telephone_NO` varchar(20) NOT NULL,
                      `Email_Address` varchar(100) NOT NULL,
                      `Cellphone_NO` varchar(15) NOT NULL,
                      `Grade_Level` varchar(50) NOT NULL,
                      `Section` varchar(50) NOT NULL,
                      `School_Year` varchar(50) NOT NULL,
                      `Admission_Date` varchar(50) NOT NULL,
                      `Guardian_Name` varchar(100) NOT NULL,
                      `Guardian_Relationship` varchar(50) NOT NULL,
                      `Guardian_Address` varchar(100) NOT NULL,
                      `Guardian_Contact` varchar(20) NOT NULL,
                      `location` varchar(200) NOT NULL,
                      PRIMARY KEY (`studentID`)
                    ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

                    if (mysqli_query($conn, $sql)) {
                        echo "<div class='alert alert-success'>Student table created successfully!</div>";
                        echo "<p><a href='student_profiles.php' class='btn btn-primary'>Go to Student Records</a></p>";
                    } else {
                        echo "<div class='alert alert-error'>Error creating student table: " . mysqli_error($conn) . "</div>";
                    }

                    mysqli_close($conn);
                } else {
                ?>
                <div class="alert alert-info">
                    <p>This script will create the necessary database table for student records.</p>
                    <p>Click the button below to install the student records functionality.</p>
                </div>
                <form method="post">
                    <button type="submit" name="install" class="btn btn-primary btn-large">Install Student Records</button>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>