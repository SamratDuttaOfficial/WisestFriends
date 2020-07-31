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
                            <form  action="reset_password_save.php" method="post" autocomplete="on"> 
                                <h4> Reset Password </h4> 
                                <hr>
                                <p>                                     
                                    <label for="username" class="uname" data-icon="u">Your username</label>
                                    <input type="text" name="name" required="required" placeholder="Username" id="name" class="demoInputBox" autocomplete="off" maxlength="20">
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="">Your Class/Year </label>
                                    <select id="passwordsignup"  name="gradyear" required="required">
                                        <option>Class V</option>
                                        <option>Class VI</option>
                                        <option>Class VII</option>
                                        <option>Class VIII</option>
                                        <option>Class IX</option>
                                        <option>Class X</option>
                                        <option>Class XI</option>
                                        <option>Class XII</option>
                                        <option>First Year</option>
                                        <option>Second Year</option>
                                        <option>Third Year</option>
                                        <option>Fourth Year</option>
                                        <option>Fifth Year</option>
                                    </select>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="u">Your Institution Code </label>
                                    <select id="passwordsignup"  name="collegecode" required="required">
                                        <option>BCREC120</option>
                                        <option>BMHSWB</option>
                                    </select>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="">Secret Info </label>
                                    <select id="passwordsignup"  name="secret_info" required="required">
                                        <option value="0">Your dog's name</option>
                                        <option value="1">Your mother's maiden name</option>
                                        <option value="2">Name of the city you were born in</option>
                                        <option value="3">Your nickname</option>
                                    </select>
                                    <input id="passwordsignup" name="secret_answer" required="required" type="text" placeholder="Enter your answer here" maxlength="25" />
                                    <br><small style="font-family:courier,'new courier';" class="text-muted">This field is case sensitive. Take care of uppercase and lowercase letters. </small>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your new password </label>
                                    <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8d561651$EO" maxlength="20" />
                                </p>
                                <small style="font-family:courier,'new courier';" class="text-muted">Caution: By clicking 'RESET' you are accepting all the <u><a href="tos.txt">Terms of services</a></u> and <u><a href="privacypolicy.htm"> Privacy policies</a></u> of <nobr>'Wisest Friends'.</nobr></small>              
                                <p class="signin button"> 
                                    <input type="submit" value=" RESET "/> 
                                </p>
                                <p>  
                                    Want to log in instead?
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
