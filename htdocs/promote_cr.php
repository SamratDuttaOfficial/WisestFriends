<?php ob_start(); ?>
<?php
include('dbcon.php');
$student_username = $_GET['student_username'];

$conn->query("update members set type = 'CR', cr = 'Approved' where username='$student_username'");
header('location:students.php');
?>