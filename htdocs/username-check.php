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
                                <p>
									Go and create an account:
                                <br>    
									<a href="http://wisestfriends.epizy.com/#toregister" class="to_register">Create Account</a>                                  
                                </p>
                                </form>
                        </div>
                </div>                
                </div>  
            </section>
        </div>
    </body>
</html>
