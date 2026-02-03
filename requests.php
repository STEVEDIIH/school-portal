<?php
session_start();
include('../db_connection.php');

if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin','staff'])) die("Access denied!");

$result = mysqli_query($conn, "SELECT * FROM inventory_requests");
?>

<h2>Inventory Requests</h2>
<table border="1">
<tr><th>ID</th><th>Item</th><th>Quantity</th><th>Status</th></tr>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['item'] ?></td>
<td><?= $row['quantity'] ?></td>
<td><?= $row['status'] ?></td>
</tr>
<?php } ?>
</table>
