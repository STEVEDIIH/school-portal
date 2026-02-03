<?php
session_start();
include('../db_connection.php');

if (!isset($_SESSION['user_id'])) {
    die("Access denied! Please log in.");
}

// Fetch payments based on role
if ($_SESSION['role'] == 'student') {
    $student_id = $_SESSION['student_id'];
    $result = mysqli_query($conn, "
        SELECT p.id, s.full_name, s.reg_number, p.amount, p.payment_date
        FROM payments p
        JOIN students s ON p.student_id = s.id
        WHERE s.id='$student_id'
        ORDER BY p.payment_date DESC
    ");
} else {
    $result = mysqli_query($conn, "
        SELECT p.id, s.full_name, s.reg_number, p.amount, p.payment_date
        FROM payments p
        JOIN students s ON p.student_id = s.id
        ORDER BY p.payment_date DESC
    ");
}
?>

<h2>Payment Receipts</h2>
<table border="1">
    <tr>
        <th>Receipt ID</th>
        <th>Student</th>
        <th>Reg Number</th>
        <th>Amount Paid</th>
        <th>Payment Date</th>
        <th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['full_name'] ?></td>
        <td><?= $row['reg_number'] ?></td>
        <td><?= $row['amount'] ?></td>
        <td><?= $row['payment_date'] ?></td>
        <td><a href="generate_receipt.php?id=<?= $row['id'] ?>">Download Receipt</a></td>
    </tr>
    <?php } ?>
</table>
