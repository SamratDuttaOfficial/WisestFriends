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
                            <form  action="signup_save.php" method="post" autocomplete="on"> 
                                <h4> Sign up (for teachers only) </h4> 
                                <hr>
                                <p>                                     
                                    <label for="username" class="uname" data-icon="u">Your username</label>
                                    <input type="text" name="name" required="required" placeholder="Username" id="name" class="demoInputBox" autocomplete="off" maxlength="20">
                                    <a href="username-check.php"> Check username availability</a>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="u">Your Email Address </label>
                                    <input id="passwordsignup" name="email" required="required" type="text" placeholder="Email address" maxlength="20"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8d561651$EO" maxlength="20" />
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="u">Your First Name </label>
                                    <input id="passwordsignup" name="firstname" required="required" type="text" placeholder="First Name" maxlength="20" />
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="u">Your Last Name </label>
                                    <input id="passwordsignup" name="lastname" required="required" type="text" placeholder="Last Name" maxlength="20" />
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="">Your Gender </label>
                                    <select id="passwordsignup"  name="gender" required="required">
                                        <option></option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="u">Your College Code </label>
                                    <input id="passwordsignup" name="collegecode" required="required" type="text" placeholder="College Code" maxlength="10" />
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="u">Your Department </label>                                    
                                    <input id="passwordsignup" name="stream" required="required" type="text" placeholder="Stream" maxlength="10" />
                                </p>
                                <p>
                                    <small style="font-family:courier,'new courier';" class="text-muted">You can write "all" in small letters in case you don't have a specific department.</small>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="u">Your ID Number (if any) </label>
                                    <input name="roll" type="text" placeholder="Roll Number" maxlength="12" />
                                </p>
                                <input name="gradyear" type="hidden" value="0" />
                                <p> 
                                    <input name="type" type="hidden" value="Unverified Teacher" />
                                    <small style="font-family:courier,'new courier';" class="text-muted">If you sign up as an 'Unverified Teacher' your ID will be manually verified </small>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="u">Your ID Proof </label>
                                    <input type="file" name="idcard_image" />
                                </p>
                                <small style="font-family:courier,'new courier';" class="text-muted">Caution: By clicking 'SIGN UP' you are accepting all the <u><a href="tos.txt">Terms of services</a></u> and <u><a href="privacypolicy.htm"> Privacy policies</a></u> of <nobr>'Wisest Friends'.</nobr></small>              
                                <p class="signin button"> 
                                    <input type="submit" value="Sign up"/> 
                                </p>
                                <p>  
                                    Already a member ?
                                <br>    
                                    <a href="http://wisestfriends.com" class="to_register"> Go and log in </a>
                                </p>
                            </form>
                        </div>
                </div>                
                </div>  
            </section>
        </div>
    </body>
</html>
