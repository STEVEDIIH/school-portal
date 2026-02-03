<?php
session_start();
include('../db_connection.php');

if (!isset($_SESSION['user_id'])) {
    die("Access denied!");
}

$result = mysqli_query($conn, "SELECT * FROM courses");
?>

<h2>Courses</h2>
<table border="1">
<tr><th>ID</th><th>Course Name</th><th>Year</th></tr>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['course_name'] ?></td>
    <td><?= $row['year'] ?></td>
</tr>
<?php } ?>
</table>
