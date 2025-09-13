<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid">
            <div class="span6">
            <?php
                $edit_query=mysqli_query($conn,"select * from student where studentID='$get_id'")or die(mysqli_error());
                $row=mysqli_fetch_array($edit_query);
            ?>
                <div class="card">
                    <div class="card-header">
                        <h4><i class="icon-user icon-large"></i> Personal Information</h4>
                    </div>
                    <div class="card-body">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="input01">Student No:</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo  $row['Student_No']; ?>"  name="student_no" class="input-xlarge" id="input01" >
                                </div>     
                            </div>
                        
                            <div class="control-group">
                                <label class="control-label" for="input01">Surname:</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo  $row['LastName']; ?>"  name="surname" class="input-xlarge" id="input01" >
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label"  for="input01">FirstName:</label>
                                <div class="controls">
                                    <input type="text" value="<?php echo  $row['FirstName']; ?>" name="firstname" class="input-xlarge" id="input01" >
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label"  for="input01">MiddleName:</label>
                                <div class="controls">
                                    <input type="text"  name="middlename" value="<?php echo  $row['MiddleName']; ?>" class="input-xlarge" id="input01">
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Residential Address:</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="<?php echo  $row['Residential_Address']; ?>"  name="Residential_Address" id="input01">
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">ZIP CODE:</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="ZIP_CODE" value="<?php echo  $row['ZIP_CODE']; ?>" id="input01" >
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Telephone NO:</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="Telephone_NO" id="input01" value="<?php echo  $row['Telephone_NO']; ?>">
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Email Address:</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="Email_Address" id="input01" value="<?php echo  $row['Email_Address']; ?>" >
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Cellphone NO:</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="Cellphone_NO" id="input01" value="<?php echo  $row['Cellphone_NO']; ?>">
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Grade Level:</label>
                                <div class="controls">
                                    <select name="Grade_Level" class="input-xlarge">
                                        <option><?php echo $row['Grade_Level']; ?></option>
                                        <option>Grade 1</option>
                                        <option>Grade 2</option>
                                        <option>Grade 3</option>
                                        <option>Grade 4</option>
                                        <option>Grade 5</option>
                                        <option>Grade 6</option>
                                        <option>Grade 7</option>
                                        <option>Grade 8</option>
                                        <option>Grade 9</option>
                                        <option>Grade 10</option>
                                        <option>Grade 11</option>
                                        <option>Grade 12</option>
                                    </select>
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Section:</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="Section" id="input01" value="<?php echo $row['Section']; ?>" >
                                </div>     
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="icon-info-sign icon-large"></i> Additional Information</h4>
                    </div>
                    <div class="card-body">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="input01">School Year:</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="School_Year" id="input01" value="<?php echo $row['School_Year']; ?>" >
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Admission Date:</label>
                                <div class="controls">
                                    <input type="text"  name="Admission_Date" class="Birthdate" value="<?php echo $row['Admission_Date']; ?>" >
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Guardian Name:</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="Guardian_Name" id="input01" value="<?php echo $row['Guardian_Name']; ?>" >
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Guardian Relationship:</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="Guardian_Relationship" id="input01" value="<?php echo $row['Guardian_Relationship']; ?>" >
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Guardian Address:</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="Guardian_Address" id="input01" value="<?php echo $row['Guardian_Address']; ?>" >
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Guardian Contact:</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="Guardian_Contact" id="input01" value="<?php echo $row['Guardian_Contact']; ?>" >
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Image:</label>
                                <div class="controls">
                                    <input type="file" name="image" class="font"> 
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Date of Birth:</label>
                                <div class="controls">
                                    <input type="text"  name="Birth_date" class="Birthdate" value="<?php echo $row['Date_of_Birth']; ?>">
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Place of Birth:</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="birth_place" id="input01" value="<?php echo $row['birth_place']; ?>" >
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Sex:</label>
                                <div class="controls">
                                    <select name="sex">
                                    <option><?php echo $row['Sex']; ?></option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Civil Status:</label>
                                <div class="controls">
                                    <input type="text" name="civil_status" class="input-xlarge" id="input01" value="<?php echo $row['civil_status']; ?>">
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Citizenship:</label>
                                <div class="controls">
                                    <input type="text" name="citizenship" class="input-xlarge" id="input01" value="<?php echo $row['citizenship']; ?>">
                                </div>     
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    Height(m): <input type="text" class="input-mini" id="input01" name="height" value="<?php echo $row['height']; ?>">
                                    Weight(kg): <input type="text" class="input-mini" id="input01" name="weight" value="<?php echo $row['weight']; ?>">
                                </div>     
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input01">Blood Type:</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" name="blood_type" id="input01" value="<?php echo $row['blood_type']; ?>">
                                </div>     
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>                                   
</div>