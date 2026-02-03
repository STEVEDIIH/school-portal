<?php
session_start();
include('../db_connection.php');

if (!isset($_SESSION['user_id']) || !in_array($_SESSION['role'], ['admin','staff'])) {
    die("Access denied! Only staff and admins can view inventory.");
}

$result = mysqli_query($conn, "SELECT * FROM inventory_items");
?>

<h2>Inventory Items</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Item Name</th>
        <th>Category</th>
        <th>Quantity</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['item_name'] ?></td>
        <td><?= $row['category'] ?></td>
        <td><?= $row['quantity'] ?></td>
    </tr>
    <?php } ?>
</table>
