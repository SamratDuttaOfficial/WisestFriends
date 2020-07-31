<?php ob_start(); ?>
<?php include('index_header.php'); ?>
<?php
	include('dbcon.php');
	if (isset($_POST['submit'])) {
		$member_id = $_POST['member_id'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$uniquesavename=time().uniqid(rand());
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
	 	$photo_size = filesize($_FILES['image']['tmp_name']);
	    $file_type=$_FILES['image']['type'];
	    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

	    $extensions= array("jpeg","jpg","png");
	    $location=0; //0 for none

	    if(in_array($file_ext,$extensions)=== true){
	        if($photo_size < 2097152){ //max 2mb image
	            if ($image_size==TRUE){
	                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/idcard/" . $uniquesavename . $image_name);
	                $location = htmlspecialchars("/upload/idcard/" . $uniquesavename . $image_name);
	                $conn->query("update members set idcard='$location' where member_id = '$member_id'");
	          	}
	        }

	    }

}

?>



	<script>
	window.location = 'change_idcard.php<?php echo '?id='.$member_id; ?>';
</script>