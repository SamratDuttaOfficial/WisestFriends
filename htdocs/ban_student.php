<?php ob_start(); ?>
<?php
include('dbcon.php');
$student_username = $_POST['student_username'];
$banned_by_username = $_POST['banned_by_username'];
$conn->query("update members set banned = '$banned_by_username' where username='$student_username'");
header('location:students.php');
?>