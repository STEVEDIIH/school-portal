<?php
session_start();
include('../db_connection.php');

// Only admin can edit students
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    die("Access denied!");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE id='$id'"));
}

if (isset($_POST['update'])) {
    $reg = $_POST['reg_number'];
    $name = $_POST['full_name'];
    $course = $_POST['course'];
    $year = $_POST['year_of_study'];
    $contact = $_POST['contact'];

    mysqli_query($conn, "UPDATE students SET reg_number='$reg', full_name='$name', course='$course', year_of_study='$year', contact='$contact' WHERE id='$id'");
    echo "Student updated successfully!";
}
?>

<h2>Edit Student</h2>
<form method="POST">
    <input type="text" name="reg_number" value="<?= $student['reg_number'] ?>" required><br>
    <input type="text" name="full_name" value="<?= $student['full_name'] ?>" required><br>
    <input type="text" name="course" value="<?= $student['course'] ?>" required><br>
    <input type="text" name="year_of_study" value="<?= $student['year_of_study'] ?>" required><br>
    <input type="text" name="contact" value="<?= $student['contact'] ?>" required><br>
    <button name="update">Update</button>
</form>
