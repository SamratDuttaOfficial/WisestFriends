<?php include('header.php'); ?>    
<?php include('session.php'); ?>

<?
  if($session_type=="Guest")
  header('location:guesterror.php');
?>

    <body>
	<?php include('navbar.php'); ?>
			<hr>
      <center>
        Your current ID Card picture:
        <img class="pp" src="<?php echo $profile_idcard_image; ?>" height="140" width="160">
      </center>
     <hr>
        
      <?php
  $query = $conn->query("select * from members where member_id = '$session_id'");
  $row = $query->fetch();
  $id = $row['member_id'];
  ?>

  <center>
    To change the ID Card picture, select an image of JPG or PNG format (size lesser than 2MB).
      <hr>
<form method="post" action="save_idcard.php" enctype="multipart/form-data">
  <input type="hidden" name="member_id" value="<?php echo $id; ?>">
  <input type="file" name="image" required="required" />
            <button type="submit" name="submit" class="btn btn-success">Change ID Card Picture </button>
      </form>
      </center>

	
          </div>

        </div>
      </div>                                     
                                                      
   	</div><!--/col-12-->
  </div>
</div>
                                                
                                                                                
<?php include('footer.php'); ?>
        
    </body>
</html>