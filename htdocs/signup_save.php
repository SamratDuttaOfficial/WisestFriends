<?php ob_start(); ?>
<?php include('index_header.php'); ?>
<body>
<?php
include('dbcon.php');

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-.]/', '', $string); // Removes special chars.

   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

$username = clean(htmlspecialchars($_POST['name']));
$email = htmlspecialchars($_POST['email']);
$pass = htmlspecialchars($_POST['password']);
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$gender = htmlspecialchars($_POST['gender']);
$collegecode = htmlspecialchars($_POST['collegecode']);
$stream = htmlspecialchars($_POST['stream']);
$roll = htmlspecialchars($_POST['roll']);
$gradyear = htmlspecialchars($_POST['gradyear']);
$pass1 = hash('sha384', $pass);
$pass2 = hash('sha256', $pass1);
$pass3 = hash('md5', $pass2);
$pass4 = hash('snefru', $pass3);
$pass5 = hash('crc32', $pass4);
$password = hash('sha512', $pass5);
$type = htmlspecialchars($_POST['type']);

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $uniquesavename = time().uniqid(rand());
    $image_name = clean(addslashes($_FILES['image']['name']));
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


if(!empty($_POST["name"])) {
  $result = $conn->query("SELECT count(*) FROM members WHERE username='" . $_POST["name"] . "'");
  $row = $result->fetch();
  $user_count = $row[0];

  $result_rollcheck = $conn->query("SELECT count(*) FROM members WHERE roll= '$roll' AND collegecode='$collegecode'");
  $row_rollcheck = $result_rollcheck->fetch();
  $user_count_rollcheck = $row_rollcheck[0];


  if($user_count>0) {
      echo "<button onclick='goBack()' type='button' class='btn btn-primary active'> Username Unavailable. Go Back </button> 
            <script>
            function goBack() {
            window.history.back();
            }
            </script>";
  }  
  else if($user_count_rollcheck>0) {
      echo "<h4><font color='white'>Someone from your college with this roll number is already signed up. Please contact your respective college faculty with this issue.</text></h4>
            <button onclick='goBack()' type='button' class='btn btn-primary active'> Roll Unavailable. Go Back </button> 
            <script>
            function goBack() {
            window.history.back();
            }
            </script>";
  }
  else{

$conn->query("insert into members (username,password,firstname,lastname,gender,image,email,collegecode,stream,roll,gradyear,type,idcard) values ('$username','$password','$firstname','$lastname','$gender','images/No_Photo_Available.jpg','$email','$collegecode','$stream','$roll','$gradyear','$type','$location')");	


?>
	<button onclick='goLogin()' type='button' class='btn btn-primary active'> Sign Up Successful. Go Login </button> 
            <script>
            function goLogin() {
            window.location = 'index.php';
            }
            </script>
<?php }
}?>
</body>
</html>