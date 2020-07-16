<?php ob_start(); ?>
<?php
include('dbcon.php');
include('session.php');
$receiver_username  = $_POST['receiver_username'];
$my_message  = $_POST['my_message'];

$query = $conn->query("select * from members where username = '$receiver_username'");
	while($row = $query->fetch()){
	$receiver_id = $row['member_id'];	
} 

$conn->query("insert into message(reciever_id,content,date_sended,sender_id) values('$receiver_id','$my_message',NOW(),'$session_id')");
?>
<script>alert('Message Sent');</script>
<script>window.history.back(); </script>
