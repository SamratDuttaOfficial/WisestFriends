<?php ob_start(); ?>
<?php
include('dbcon.php');
$session_id = $_GET['session_id'];

$conn->query("update members set cr = 'Applied' where member_id = '$session_id'");
header('location:profile.php');
?>