<?php
include('../db_connection.php');

// Add sample fee structure form
if (isset($_POST['save'])) {
    $program = $_POST['program'];
    $year = $_POST['year'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO fee_structure (program, year, amount) VALUES ('$program', '$year', '$amount')";
    if (mysqli_query($conn, $sql)) {
        echo "Fee structure added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Fee Structure</h2>
<form method="POST">
    <input type="text" name="program" placeholder="Program Name" required><br>
    <input type="text" name="year" placeholder="Year" required><br>
    <input type="text" name="amount" placeholder="Fee Amount" required><br>
    <button name="save">Save</button>
</form>
