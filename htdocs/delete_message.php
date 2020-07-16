<?php ob_start(); ?>
<?php
include('dbcon.php');
$get_id = $_GET['id'];
$conn->query("delete from message where message_id = '$get_id'");
?>
<script>window.history.back(); </script>