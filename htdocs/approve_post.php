<?php ob_start(); ?>
<?php
include('dbcon.php');
$post_id = $_GET['post_id'];
$p_unique_id=$_GET["p_unique_id"];
$approver_name=$_GET["approver_name"];
$approver_username=$_GET["approver_username"];


$conn->query("update post set status = 'Approved',approver_name = '$approver_name',approver_username = '$approver_username' where post_id='$post_id' AND p_unique_id='$p_unique_id'");
header('location:approve.php');
?>