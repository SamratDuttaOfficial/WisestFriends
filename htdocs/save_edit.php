<?php ob_start(); ?>
<?php
include('dbcon.php');
$member_id = htmlspecialchars($_POST['member_id']);
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$gender = htmlspecialchars($_POST['gender']);
$address = htmlspecialchars($_POST['address']);
$email = htmlspecialchars($_POST['email']);
$contact_no = htmlspecialchars($_POST['contact_no']);

 

$conn->query("update members set firstname = '$firstname',lastname='$lastname',gender='$gender',address='$address',email='$email',contact_no='$contact_no' where member_id = '$member_id'
");


?>
<script>
	window.location = 'edit_profile.php<?php echo '?id='.$member_id; ?>';
</script>