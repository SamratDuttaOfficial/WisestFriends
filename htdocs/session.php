<?php ob_start(); ?>
<?php
session_start();
if (!isset($_SESSION['id'])){
header('location:index.php');
}
$session_id = $_SESSION['id'];
$session_query = $conn->query("select * from members where member_id = '$session_id'");
$user_row = $session_query->fetch();
$username = $user_row['firstname']." ".$user_row['lastname'];
$uname = $user_row['username'];
$profile_image = $user_row['image'];
$session_collegecode = $user_row['collegecode'];
$session_gradyear = $user_row['gradyear'];
$session_stream = $user_row['stream'];
$session_roll = $user_row['roll'];
$session_type = $user_row['type'];
$session_ban_status = $user_row['banned'];

if($session_ban_status!="No")
    header('location:banned.php');
?>