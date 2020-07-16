<?php include('header.php'); ?>    
<?php include('session.php'); ?>    
    <body>
	<?php include('navbar.php'); ?>
			<hr>
      <center><img class="pp" src="<?php echo $profile_image; ?>" height="140" width="160"></center>
     <hr>
        
      <?php
  $query = $conn->query("select * from members where member_id = '$session_id'");
  $row = $query->fetch();
  $id = $row['member_id'];
  ?>
  <hr>
  <center>
<form method="post" action="save_dp.php" enctype="multipart/form-data">
  <input type="hidden" name="member_id" value="<?php echo $id; ?>">
  <input type="file" name="image" required="required" />
            <button type="submit" name="submit" class="btn btn-success">Change Profile Picture </button>
      </form>
      </center>

	
          </div>
          <hr>
        </div>
      </div>                                     
                                                      
   	</div><!--/col-12-->
  </div>
</div>
                                                
                                                                                
<?php include('footer.php'); ?>
        
    </body>
</html>