<?php include('header.php'); ?>    
<?php include('session.php'); ?>    
<body>
	<?php include('navbar.php'); ?>
	<div id="masthead">  
		<div class="container">
			<div class="row">
      			<div class="col-md-4">
					<hr>
					<center><img class="pp" src="<?php echo $profile_image; ?>" height="140" width="160"></center>
					<hr>
					<center>
						<a class="btn btn-success" href="change_pic.php">Change Profile Picture</a>
					</center>
      			</div>
				<div class="col-md-4">
					<?php
						$query = $conn->query("select * from members where member_id = '$session_id'");
						$row = $query->fetch();
						$id = $row['member_id'];
					?>
					<hr>
					<form method="post" action="save_edit.php">
						<input type="hidden" name="member_id" value="<?php echo $id; ?>">
						Firstname: <div class="pull-right"><input type="text" name="firstname" maxlength="20" value="<?php echo $row['firstname']; ?>"></div>
						<hr>
						Lastname: <div class="pull-right"><input type="text" name="lastname" maxlength="20" value="<?php echo $row['lastname']; ?>"></div>
						<hr>
						Gender:
						<div class="pull-right">
							<select name="gender">
								<option><?php echo $row['gender']; ?></option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>
						<hr>
						Address: <div class="pull-right"><input name="address" maxlength="100" type="text" value="<?php echo $row['address']; ?>"></div>
						<hr>
						Email: <div class="pull-right"><input name="email" type="text" maxlength="100" value="<?php echo $row['email']; ?>"></div>
						<hr>
						Contact No. : <div class="pull-right"><input name="contact_no" maxlength="13" type="text" value="<?php echo $row['contact_no']; ?>"></div>
						<hr>
						<br>
						<center>
							<button name="save" class="btn edit">Save</button>
						</center>
						<br>
					<form>
				</div>

    		</div> 
		</div><!-- /cont -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="top-spacer"> </div>
					</div>
				</div> 
			</div><!-- /cont -->
		</div>
	<?php include('footer.php'); ?>        
</body>
</html>