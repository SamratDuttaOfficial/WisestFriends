<?php ob_start(); ?>
<?php
include('dbcon.php');
$post_id = $_GET['post_id'];
$p_unique_id=$_GET["p_unique_id"];
$query = $conn->query("select * from post where post_id = '$post_id' AND p_unique_id='$p_unique_id' ");
	                 while($row = $query->fetch()){
	                 $photo = $row['photo'];
unlink($photo);
}
$conn->query("delete from post where post_id='$post_id' AND p_unique_id='$p_unique_id'");
header('location:profile.php');
?>