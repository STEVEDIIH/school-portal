<?php
session_start();
include('../db_connection.php');

// Restrict access to admin only
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    die("Access denied! Only admins can add students.");
}

if (isset($_POST['save'])) {
    $reg = $_POST['reg_number'];
    $name = $_POST['full_name'];
    $course = $_POST['course'];
    $year = $_POST['year_of_study'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO students (reg_number, full_name, course, year_of_study, contact)
            VALUES ('$reg', '$name', '$course', '$year', '$contact')";
    if (mysqli_query($conn, $sql)) {
        echo "Student added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Add Student</h2>
<form method="POST">
    <input type="text" name="reg_number" placeholder="Reg No" required><br>
    <input type="text" name="full_name" placeholder="Full Name" required><br>
    <input type="text" name="course" placeholder="Course" required><br>
    <input type="text" name="year_of_study" placeholder="Year" required><br>
    <input type="text" name="contact" placeholder="Contact" required><br>
    <button name="save">Save</button>
</form>
