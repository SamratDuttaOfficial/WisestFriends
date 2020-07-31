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
        $cr = $row["cr"];        
        echo $row["firstname"]." ".$row["lastname"]."<br>";
        echo "Gender"." : ".$row["gender"]."<br>";
        echo "Address"." : ".$row["address"]."<br>";
        echo "Class/Year"." : ".$row["gradyear"]."<br>";
        echo "Stream"." : ".$row["stream"]."<br>";
        echo "Email"." : ".$row["email"]."<br>";
        echo "Contact No."." : ".$row["contact_no"]."<br>";
        echo "<span class='label label-info'>".$row["type"]."</span>";        
          if($session_type=="Student" && $cr=="no"){ 
            echo "<form method='get' action='apply_cr.php'>";
            echo "<input type='hidden' name='session_id' value=".$session_id.">";
            echo "<small><button type='submit' name='submit' class='btn btn-link'> Apply to become CR </button></small>";
            echo "</form>";
            echo "<small>Apply to become the Class Representative of your class</small><br>";
          }
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
				<input type="file" name="image" accept=".jpg, .jpeg, .png, .pdf" />
        <br><small style="font-family:courier,'new courier';" class="text-muted"><b>Select JPG, JPEG or PNG file, lesser than 2MB or PDF file lesser than 25MB.</b></small>
        <input type="hidden" name="type" value="Official Post" />
        <? 
          if($session_type=="Student" || $session_type=="Unverified teacher")
            $status = "Pending Approval";
          else
            $status = "Approved";
        ?>
        <input type="hidden" name="status" value="<? echo $status ?>" />
        <input type="hidden" name="collegecode" value="<? echo $session_collegecode ?>" /><br>
        <small style="font-family:courier,'new courier';" class="text-muted">Select the <b>Year/Class</b> for whom this post is relevant.</small><br>
        <select id="currency"  name="stream">
                    <option value="all">All Streams</option>
                    <?
                        if($session_stream!="all")
                    echo "<option value=".$session_stream.">".$session_stream."</option>";
                    ?>
        </select>        
        <select id="currency"  name="gradyear">
                    <option value="0">All</option>               
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
				<button type="submit" name="submit" class="btn btn-success"><i class="icon-share"></i> ADD </button>
			 </form>
       <small style="font-family:courier,'new courier';" class="text-muted">Caution: You can't edit a post once you post it. By clicking 'Add' you are accepting all the <u><a href="tos.txt">Terms of services</a></u> and <u><a href="privacypolicy.htm"> Privacy policies</a></u> of <nobr>'Wisest Friends'.</nobr></small><br> 
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

      </div>
      <br><br>
    </div>
    <br>
    <div class="container">
		  <div class="row">
          <div class="col-md-12"> 
            <div class="panel">
              <div class="panel-body">
                <!--/stories-->
                <div class="row">    
                  <br>
						      <?php
                    $limit = 12;

$query = "SELECT * FROM post where member_id = $session_id"; 
$stmt = $conn->prepare( $query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
$stmt->execute();   
$total_results = $stmt->rowCount(); 
$total_pages = ceil($total_results/$limit);

if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}

$starting_limit = ($page-1)*$limit;

	                 $query = $conn->query("select * from post where member_id = '$session_id' order by post_id DESC limit $starting_limit,$limit ");
	                 while($row = $query->fetch()){
	                 $posted_by = $row['poster_name']." #".$row['poster_username'];
                   $date_posted = $row['date_posted'];
	                 $id = $row['post_id'];
                   $p_unique_id = $row['p_unique_id'];
                   $member_id_post = $row['member_id'];
                   $photo = $row['photo'];
                   $file = str_replace(" ", '%20', $row['file']);
                   $status = $row['status'];
                   $approver_username = $row['approver_username'];
                   $approver_name = $row['approver_name'];
	                ?> 
                                  
                  <div class="col-sm-post">
                  <div class="alert-post"><b><?php echo $row['title']; ?></b><br><?php echo $row['content']; ?></div> 
                  <div class="alert-post-image">
                    <?php
                      if($photo==1){ 
                        echo '<center><img style="max-width:100%;max-height:200px" class="product_image" alt="No image available" src='.$file.'></center>'; 
                      }
                      if($photo==2){ 
                        echo '<a href="'.$file.'"> Download Attached PDF </a>'; 
                      } 
                    ?>   
                  </div> 
                  <div>
                    <form method="get" action="all_comments.php">
                        <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                        <input type="hidden" name="p_unique_id" value="<?php echo $p_unique_id; ?>">
                        <button type="submit" class="btn btn-link"> View all </button>
                    </form>
                    <form method="get" action="confirm_delete.php">
                      <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                      <input type="hidden" name="p_unique_id" value="<?php echo $p_unique_id; ?>">
                      <button type="submit" name="submit" class="btn btn-danger-link"><i class="icon-remove"></i> Delete </button>
                    </form>
        

                  <h4><span class="label label-info"> <?php echo $status; ?></span></h4>
                  <? if($status=="Approved"){
                  echo "<small>Approved by: @".$approver_username." - ".$approver_name."</small>";
                     }
                  ?>
                  <h4><span class="label label-info"> <?php echo $date_posted; ?></span></h4>              
                </div>  
              </div>

	              <?php } ?>
    <div style="display: inline-block; position: absolute; left: 0; right: 0; bottom: 0;"><div class="alert"><center>
    <? for ($page=1; $page <= $total_pages ; $page++): ?>    
    <a href='<?php echo "?page=$page"; ?>'><?php  echo $page; ?></a>
    <?php endfor; ?>
    </center>
    </div>
    </div>        

            </div>
          </div>
      </div>
    </div>
