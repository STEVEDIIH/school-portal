<?php
session_start();
include('../db_connection.php');

if (!isset($_SESSION['user_id'])) die("Access denied!");

// Fetch results based on role
if ($_SESSION['role'] == 'student') {
    $id = $_SESSION['student_id'];
    $result = mysqli_query($conn, "SELECT * FROM exam_results WHERE student_id='$id'");
} else {
    $result = mysqli_query($conn, "SELECT * FROM exam_results");
}
?>

<h2>Exam Results</h2>
<table border="1">
<tr><th>ID</th><th>Student ID</th><th>Course</th><th>Score</th></tr>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['student_id'] ?></td>
    <td><?= $row['course'] ?></td>
    <td><?= $row['score'] ?></td>
</tr>
<?php } ?>
</table>
