<?php
session_start();
include('../db_connection.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    die("Access denied!");
}

if (isset($_POST['save'])) {
    $course_name = $_POST['course_name'];
    $year = $_POST['year'];

    mysqli_query($conn, "INSERT INTO courses (course_name, year) VALUES ('$course_name','$year')");
    echo "Course added successfully!";
}
?>

<h2>Add Course</h2>
<form method="POST">
    <input type="text" name="course_name" placeholder="Course Name" required><br>
    <input type="text" name="year" placeholder="Year" required><br>
    <button name="save">Save</button>
</form>
