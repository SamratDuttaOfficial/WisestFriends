<?php ob_start(); ?>
<?php
include('dbcon.php');
if (isset($_POST['submit'])) {

$member_id = $_POST['member_id'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$uniquesavename=time().uniqid(rand());
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
 
		move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $uniquesavename . $_FILES["image"]["name"]);
		$location = "/upload/" . $uniquesavename . $_FILES["image"]["name"];

$conn->query("update members set image='$location' where member_id = '$member_id'");

?>
<?php
	}
	?>
	<script>
	window.location = 'home.php<?php echo '?id='.$member_id; ?>';
</script>