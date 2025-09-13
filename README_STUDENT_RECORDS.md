# Student Records Management System

This module extends the Record Keeping Management System to include student records management functionality.

## Files Created

1. `student_profiles.php` - Main student records page
2. `student_add.php` - Add new student page
3. `student_add_info.php` - Form for adding student information
4. `student_edit.php` - Edit student information page
5. `student_edit_info.php` - Form for editing student information
6. `student_button_view.php` - Modal for viewing student details
7. `student_button_delete.php` - Modal for confirming student deletion
8. `student_delete.php` - Script for deleting student records
9. `search_student.php` - Search functionality for students
10. `sort_student.php` - Sorting functionality for students
11. `db/student_table.sql` - SQL script to create student table
12. `create_student_table.php` - PHP script to create student table (if direct SQL import is not possible)

## Database Setup

To set up the student records functionality, you need to create a `student` table in your database.

### Method 1: Using SQL Import
If you have direct access to MySQL, run:
```sql
mysql -u root -p hrms < db/student_table.sql
```

### Method 2: Using PHP Script
If you can't use command line MySQL, you can try running the create_student_table.php script:
```bash
php create_student_table.php
```

### Method 3: Manual SQL Execution
Execute the following SQL query in your MySQL client:

```sql
CREATE TABLE IF NOT EXISTS `student` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
```

## Navigation Updates

The navigation has been updated in the following files to include a "Students" link:
- `home.php`
- `emp_profiles.php`
- `emp_add.php`
- `edit_emp.php`

## Features

1. Add new student records with personal information
2. Edit existing student records
3. View student details in a modal popup
4. Delete student records with confirmation
5. Search students by name or student number
6. Sort students by grade level
7. Upload student photos
8. Track guardian information

## Usage

1. Navigate to the "Students" section from the main navigation
2. Click "Add Student" to create a new student record
3. Use the search box to find specific students
4. Use the sort dropdown to filter students by grade level
5. Click "View" to see student details
6. Click "Edit" to modify student information
7. Click "Delete" to remove student records (with confirmation)

## Notes

- All student photos are stored in the `upload/` directory
- The system maintains consistency with the existing personnel management interface
- Student records include comprehensive personal information and guardian details
- The system supports all grade levels from Grade 1 to Grade 12