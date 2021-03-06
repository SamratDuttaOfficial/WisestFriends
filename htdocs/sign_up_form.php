                            <form  action="signup_save.php" method="post" autocomplete="on" enctype="multipart/form-data"> 
                                <h4> Sign up (for students only) </h4>
                                <small style="font-family:courier,'new courier';" class="text-muted">Sign Up as a TEACHER: <u><a href="signup-teachers.php">CLICK HERE</a></u></small>
								<hr>
                                <p>                                     
                                    <label for="username" class="uname" data-icon="u">Your username</label>                                    
                                    <input type="text" name="name" required="required" placeholder="Username" id="name" class="demoInputBox" autocomplete="off" maxlength="20">
                                    <a href="username-check.php"> Check username availability</a>
                                    <br><small style="font-family:courier,'new courier';" class="text-muted">Username must not contain spaces. All white spaces will be automatically replaced with '-'. </small>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="u">Your Email Address </label>
                                    <input id="passwordsignup" name="email" required="required" type="text" placeholder="Email address" maxlength="60"/>
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
                                    <label for="passwordsignup" class="youpasswd" data-icon="u">Your Institution Code </label>
                                    <select id="passwordsignup"  name="collegecode" required="required">
                                        <option>BCREC120</option>
                                        <option>BMHSWB</option>
                                    </select>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="u">Your Stream </label>
                                    <select id="passwordsignup"  name="stream" required="required">
                                        <option>School Curriculum</option>
                                        <option>CSE</option>
                                        <option>ECE</option>
                                        <option>CE</option>
                                        <option>EE</option>
                                        <option>ME</option>
                                        <option>IT</option>
                                    </select>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="u">Your Roll Number </label>
                                    <input id="passwordsignup" name="roll" required="required" type="Number" placeholder="Roll Number" maxlength="15" />
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
                                    <label for="passwordsignup" class="youpasswd" data-icon="">Registration Type </label>
                                    <select id="passwordsignup"  name="type" required="required">
                                        <option>Student</option>
                                    </select>
                                </p>
                                <p> 
                                    <label class="youpasswd" data-icon="u">Your ID Card Photo </label>
                                    <input type="file" name="image" required="required" />
                                    <br><small style="font-family:courier,'new courier';" class="text-muted">Your ID Card photo must be of JPG or PNG format, lesser than 2MB. </small>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="">Secret Info (for password recovery) </label>
                                    <select id="passwordsignup"  name="secret_info" required="required">
                                        <option value="0">Your dog's name</option>
                                        <option value="1">Your mother's maiden name</option>
                                        <option value="2">Name of the city you were born in</option>
                                        <option value="3">Your nickname</option>
                                    </select>
                                    <input id="passwordsignup" name="secret_answer" required="required" type="text" placeholder="Enter your answer here" maxlength="25" />
                                    <br><small style="font-family:courier,'new courier';" class="text-muted">This field is case sensitive. Take care of uppercase and lowercase letters. </small>
                                </p>
                                <small style="font-family:courier,'new courier';" class="text-muted">Caution: By clicking 'SIGN UP' you are accepting all the <u><a href="tos.txt">Terms of services</a></u> and <u><a href="privacypolicy.htm"> Privacy policies</a></u> of <nobr>'Wisest Friends'.</nobr></small>              
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p>  
									Already a member ?
                                <br>    
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>