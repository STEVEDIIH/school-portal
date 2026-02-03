<?php
include('../db_connection.php');

// Fetch all fee structures
$result = mysqli_query($conn, "SELECT * FROM fee_structure");
?>

<h2>Fee Structures</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Program</th>
        <th>Year</th>
        <th>Amount</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['program'] ?></td>
        <td><?= $row['year'] ?></td>
        <td><?= $row['amount'] ?></td>
    </tr>
    <?php } ?>
</table>
