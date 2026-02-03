<?php
session_start();
include('../db_connection.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') die("Access denied!");

$result = mysqli_query($conn, "SELECT * FROM hr_staff");
?>

<h2>Staff List</h2>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Position</th><th>Contact</th></tr>
<?php while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['position'] ?></td>
<td><?= $row['contact'] ?></td>
</tr>
<?php } ?>
</table>
