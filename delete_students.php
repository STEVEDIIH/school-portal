<?php
session_start();
include('../db_connection.php');

// Only admin can delete
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    die("Access denied!");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM students WHERE id='$id'");
    echo "Student deleted successfully!";
}
