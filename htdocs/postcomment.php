<?php ob_start(); ?>
<?php
include('dbcon.php');
include('session.php');

if (isset($_POST['submit'])) {

		$comment = htmlspecialchars($_POST['comment']);
		$post_id = $_POST['post_id'];

$conn->query("insert into comments (comment,posted_at,member_id,post_id) values('$comment',NOW(),'$session_id','$post_id')");
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
<?php
	}
	?>