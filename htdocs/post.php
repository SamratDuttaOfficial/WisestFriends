<?php ob_start(); ?>
<?php
include('dbcon.php');
include('session.php');

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-.]/', '', $string); // Removes special chars.

   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

if (isset($_POST['submit'])) {
		$p_unique_id = rand();
		$title = htmlspecialchars($_POST['title']);
		$content = htmlspecialchars($_POST['content']);		
		$type = htmlspecialchars($_POST['type']);
		$status = htmlspecialchars($_POST['status']);	
		$collegecode = htmlspecialchars($_POST['collegecode']);
		$stream = htmlspecialchars($_POST['stream']);
		$gradyear = htmlspecialchars($_POST['gradyear']);	
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$uniquesavename = time().uniqid(rand());
		$image_name = clean(addslashes($_FILES['image']['name']));
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		$photo_size = filesize($_FILES['image']['tmp_name']);
		$file_type=$_FILES['image']['type'];
      	$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      	$extensions= array("jpeg","jpg","png");
      	$extensionspdf= array("pdf");

      	$photo=0; //0 for none

      	if(in_array($file_ext,$extensions)=== true){
      			if($photo_size < 2097152){ //max 2mb image
      				if ($image_size==TRUE){
        				move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $uniquesavename . $image_name);
						$location = htmlspecialchars("/upload/" . $uniquesavename . $image_name);
						$photo=1; //1 for photo
					}
				}
				else{
						echo "The image size must me lesser than 2MB.";
						echo "<button onclick='goBack()' type='button' class='btn btn-primary active'> Go Back </button>"; 
            			echo "<script>";
            			echo "function goBack() {";
            			echo "window.location =". $_SERVER['HTTP_REFERER'];
            			echo "}";
            			echo "</script>";
				}
      	}
      	if(in_array($file_ext,$extensionspdf)=== true){
      		if ($file_type=="application/pdf"){
      			if($photo_size < 20971520){ //max 20mb pdf
        			move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $uniquesavename . $image_name);
					$location = htmlspecialchars("/upload/" . $uniquesavename . $image_name);
					$photo=2; //2 for pdfs
				}
				else{
					echo "The PDF size must me lesser than 20MB.";
					echo "<button onclick='goBack()' type='button' class='btn btn-primary active'> Go Back </button>"; 
            		echo "<script>";
            		echo "function goLogin() {";
            		echo "window.location =". $_SERVER['HTTP_REFERER'];
            		echo "}";
            		echo "</script>";
				}
			}			
      	}        
 
		
$conn->query("insert into post (title,content,type,status,date_posted,member_id,poster_name,poster_username,poster_photo,photo,file,p_unique_id,photo_size,stream,gradyear,collegecode) values('$title','$content','$type','$status',NOW(),'$session_id','$username','$uname','$profile_image','$photo','$location','$p_unique_id','$photo_size','$stream','$gradyear','$collegecode')");

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
<?php
	}
	?>