<!-- View Student Modal -->
<div class="modal hide fade" id="<?php echo $id; ?>">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3><i class="icon-list icon-large"></i> Student Details</h3>
    </div>
    <div class="modal-body">
        <div class="card">
            <div class="card-header">
                <h4><i class="icon-user icon-large"></i> Student Information</h4>
            </div>
            <div class="card-body">
                <?php
                    $query = mysqli_query($conn,"select * from student where studentID='$id'") or die(mysqli_error());
                    $row = mysqli_fetch_array($query);
                ?>
                <div class="row-fluid">
                    <div class="span6">
                        <h5>Personal Information</h5>
                        <hr>
                        <p><strong>Student No:</strong> <?php echo $row['Student_No']; ?></p>
                        <p><strong>Full Name:</strong> <?php echo $row['FirstName']." ".$row['MiddleName']." ".$row['LastName']; ?></p>
                        <p><strong>Sex:</strong> <?php echo $row['Sex']; ?></p>
                        <p><strong>Date of Birth:</strong> <?php echo $row['Date_of_Birth']; ?></p>
                        <p><strong>Place of Birth:</strong> <?php echo $row['birth_place']; ?></p>
                        <p><strong>Civil Status:</strong> <?php echo $row['civil_status']; ?></p>
                        <p><strong>Citizenship:</strong> <?php echo $row['citizenship']; ?></p>
                        <p><strong>Height:</strong> <?php echo $row['height']; ?> m</p>
                        <p><strong>Weight:</strong> <?php echo $row['weight']; ?> kg</p>
                        <p><strong>Blood Type:</strong> <?php echo $row['blood_type']; ?></p>
                        
                        <h5>Contact Information</h5>
                        <hr>
                        <p><strong>Residential Address:</strong> <?php echo $row['Residential_Address']; ?></p>
                        <p><strong>ZIP CODE:</strong> <?php echo $row['ZIP_CODE']; ?></p>
                        <p><strong>Telephone NO:</strong> <?php echo $row['Telephone_NO']; ?></p>
                        <p><strong>Email Address:</strong> <?php echo $row['Email_Address']; ?></p>
                        <p><strong>Cellphone NO:</strong> <?php echo $row['Cellphone_NO']; ?></p>
                    </div>
                    <div class="span6">
                        <h5>Academic Information</h5>
                        <hr>
                        <p><strong>Grade Level:</strong> <?php echo $row['Grade_Level']; ?></p>
                        <p><strong>Section:</strong> <?php echo $row['Section']; ?></p>
                        <p><strong>School Year:</strong> <?php echo $row['School_Year']; ?></p>
                        <p><strong>Admission Date:</strong> <?php echo $row['Admission_Date']; ?></p>
                        
                        <h5>Guardian Information</h5>
                        <hr>
                        <p><strong>Guardian Name:</strong> <?php echo $row['Guardian_Name']; ?></p>
                        <p><strong>Relationship:</strong> <?php echo $row['Guardian_Relationship']; ?></p>
                        <p><strong>Guardian Address:</strong> <?php echo $row['Guardian_Address']; ?></p>
                        <p><strong>Guardian Contact:</strong> <?php echo $row['Guardian_Contact']; ?></p>
                        
                        <h5>Student Photo</h5>
                        <hr>
                        <?php if(!empty($row['location']) && file_exists($row['location'])): ?>
                            <img src="<?php echo $row['location']; ?>" width="100" height="100" class="rounded">
                        <?php else: ?>
                            <img src="img/default-avatar.png" width="100" height="100" class="rounded">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal"><i class="icon-remove icon-large"></i> Close</a>
    </div>
</div>