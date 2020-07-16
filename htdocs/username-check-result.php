<?php ob_start(); ?>
<?php include('index_header.php'); ?>
			<?php include('dbcon.php'); ?>
    <body>
     
        <div class="container">
            <!-- Codrops top bar -->
            
                <div class="title" onmousedown="return false" onselect="return false">Wisest Friends</div>
            
            <section>				
			
                <div id="container_demo" >
                <div id="wrapper">
                        <div id="login" class="animate form">				
                    <form  method="post" action="username-check-result.php" autocomplete="on"> 
                                <h3>Check Username Availability</h3> 
								<hr>
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your Username </label>
                                    <input id="username" name="username" required="required" type="text"/>
                                </p>                                
                                <p class="login button"> 
                                    <input type="submit" name="check" value="Check" /> 
								</p>
                <?php
                function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-.]/', '', $string); // Removes special chars.

   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

  $username = clean(htmlspecialchars($_POST['username']));
  if(!empty($username)) {
  $result = $conn->query("SELECT count(*) FROM members WHERE username='$username'");
  $row = $result->fetch();
  $user_count = $row[0];
  if($user_count>0) {
      echo "<h4 style='color:#d61313'>Username Not Available.</h4>";
  }else{
      echo "<h4 style='color:#0b8915'>Username Available.</h4>";
  }
  }
?>     
                               <hr><p>
									Go and create an account:
                                <br>    
									<a href="http://wisestfriends.com/#toregister" class="to_register">Create Account</a>                                  
                                </p>
                                </form>                                
                                        

</div>
                </div>       
                </div>  
            </section>
        </div>
    </body>
</html>



