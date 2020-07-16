    <div class="row">
      <div class="col-md-4">
		    <img class="pp" src="<?php echo $profile_image; ?>" height="140" width="160">
		    <hr>
		    <a class="btn btn-success" href="change_pic.php">Change Profile Picture</a>
			<hr>
			<div class="pull-right"><a href="edit_profile.php" class="btn btn-info"><i class="icon-pencil"></i> Edit</a></div>
			 <h4>Personal Info</h4>       			
			 <?php
        $query = $conn->query("select * from members where member_id like (".$session_id.")");
        while($row = $query->fetch()){        
        echo "<h3><b>".$row["shopname"]."</h3></b>";
        echo $row["firstname"]." ".$row["lastname"]."<br>";
        echo "Gender"." : ".$row["gender"]."<br>";
        echo "Address"." : ".$row["address"]."<br>"; 
        echo "Email"." : ".$row["email"]."<br>";
        echo "Contact No."." : ".$row["contact_no"]."<br>";
        echo "Mobile No."." : ".$row["mobile"]."<br>";
        }
       ?>
		  </div>
      <div class="col-md-4">
			 <form method="post" action="post.php" enctype="multipart/form-data">
        <textarea id="thin" name="title" maxlength="100" placeholder="Title" required="required"></textarea>
        <br>
				<textarea id="thin" style="margin-top: 10px;" name="content" maxlength="100" placeholder="Description"></textarea>
				<br>        
        <small style="font-family:courier,'new courier';" class="text-muted">Your post can be seen by anyone from your college.</small><br>            
				<input type="file" name="image" />
                <input type="hidden" name="type" value="listed" />
                <input type="hidden" name="collegecode" value="<? echo $session_collegecode ?>" />
        <select id="currency"  name="stream">
                    <option value="all">All Streams</option>
                    <option value="<? echo $session_stream ?>"><? echo $session_stream ?></option>
        </select>
        <select id="currency"  name="gradyear">                  
                    <option value="0">For Everyone</option>
                    <option value="<? echo $session_gradyear ?>">For my year students only</option>
        </select>
				<button type="submit" name="submit" class="btn btn-success"><i class="icon-share"></i> ADD </button>
			 </form>
             <small style="font-family:courier,'new courier';" class="text-muted">Caution: You can't edit image name and description once you post it. By clicking 'Add' you are accepting all the <u><a href="tos.txt">Terms of services</a></u> and <u><a href="privacypolicy.htm"> Privacy policies</a></u> of <nobr>'SavePicto'.</nobr></small><br>
       <hr style= "color:#000">
       <form method="post" action="view_my_posts.php" enctype="multipart/form-data">       
       <h6><u> YEAR-MONTH-DATE</h6></u>
       <select id="currency"  name="year">
                    <option></option>                
                    <option>2018</option>
                    <option>2019</option>
        </select>
        <select id="currency"  name="month">
                    <option></option>                    
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
        </select>
        <select id="currency"  name="date">
                    <option></option>                    
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
                    <option>15</option>
                    <option>16</option>
                    <option>17</option>
                    <option>18</option>
                    <option>19</option>
                    <option>20</option>
                    <option>21</option>
                    <option>22</option>
                    <option>23</option>
                    <option>24</option>
                    <option>25</option>
                    <option>26</option>
                    <option>27</option>
                    <option>28</option>
                    <option>29</option>
                    <option>30</option>
                    <option>31</option>
        </select> 
        <button type="submit" name="submit" class="btn btn-primary active"> Show All </button>     
       </form>
      </div>
      <div class="col-md-4">
<!--notificts-->
<!--ads-->
 <!-- Begin BidVertiser code -->
<SCRIPT data-cfasync="false" SRC="//bdv.bidvertiser.com/BidVertiser.dbm?pid=799370&bid=1928193" TYPE="text/javascript"></SCRIPT>
<!-- End BidVertiser code --> 
      </div>
    </div>
 