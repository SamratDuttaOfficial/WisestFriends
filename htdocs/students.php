<?php 
  $gradyear=$_POST["gradyear"];
  $stream=$_POST["stream"];
  $firstname=$_POST["firstname"];
  $lastname=$_POST["lastname"];
  $search_username=$_POST["search_username"]; 
?>
<?php include('header.php');?>
<?php
  if($session_type!="Verified Teacher")
    header('location:home.php');
?>     
    <body>
  <?php include('navbar.php'); ?>
      <div id="masthead">  
        <div class="container">
          <center><h4>See informations of all the students from your college.</h4>
          <small>You will see informations of those students who are singed up in Wisest Friends.</small><hr>
          <form method="post" action="students.php" enctype="multipart/form-data">       
            <input type="text" name="gradyear" id="span5" placeholder="Graduation Year">
            <input type="text" name="stream" id="span5" placeholder="Stream">
            <input type="text" name="firstname" id="span5" placeholder="First Name">
            <input type="text" name="lastname" id="span5" placeholder="Last Name">
            <input type="text" name="search_username" id="span5" placeholder="Username">
            <button type="submit" name="submit" class="btn btn-primary active"> Search Students </button></center>     
          </form>
       <hr>
        </div><!-- /cont -->
        <div class="container">
          <div class="row">
          <div class="col-md-12">
            <div class="top-spacer"> </div>
          </div>
          </div> 
        </div><!-- /cont -->
      </div>
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

$query = "SELECT * FROM post where 
    collegecode = '$session_collegecode' AND gradyear LIKE '%$gradyear%' AND stream LIKE '%$stream%' AND firstname LIKE '%$firstname%' AND lastname LIKE '%$lastname%' AND username LIKE '%$search_username%' AND type='Student'
    OR
    collegecode = '$session_collegecode' AND gradyear LIKE '%$gradyear%' AND stream LIKE '%$stream%' AND firstname LIKE '%$firstname%' AND lastname LIKE '%$lastname%' AND username LIKE '%$search_username%' AND type='CR'"; 
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

  $query = $conn->query("select * from members where 
    collegecode = '$session_collegecode' AND gradyear LIKE '%$gradyear%' AND stream LIKE '%$stream%' AND firstname LIKE '%$firstname%' AND lastname LIKE '%$lastname%' AND username LIKE '%$search_username%' AND type='Student'
    OR
    collegecode = '$session_collegecode' AND gradyear LIKE '%$gradyear%' AND stream LIKE '%$stream%' AND firstname LIKE '%$firstname%' AND lastname LIKE '%$lastname%' AND username LIKE '%$search_username%' AND type='CR'
    order by member_id DESC limit $starting_limit,$limit ");
  while($row = $query->fetch()){
  $student_username = $row['username'];
  $student_name = $row['firstname']." ".$row['lastname'];
  $student_roll = $row['roll'];
  $student_gender = $row['gender'];
  $student_email = $row['email'];
  $student_contact = $row['contact_no'];
  $student_stream = $row['stream'];
  $student_gradyear = $row['gradyear'];
  $student_type = $row['type'];
  $student_ban_status = $row['banned'];
  $student_cr_status = $row['cr'];
  $image = str_replace(" ", '%20', $row['image']);
  $student_idcard = str_replace(" ", '%20', $row['idcard']);
  ?>
				<div class="col-sm-post">
             	<div class="alert-post">
                <b><?php echo $student_name; ?></b>
                <br>
                <small><?php echo $student_username; ?>
                <br>
                Roll: <?php echo $student_roll; ?><br>
                Stream: <?php echo $student_stream; ?><br>                
              </div>             
              <div class="alert-post-image"><?php echo '<center><img style="max-width:100%;max-height:200px" class="product_image" alt="No profile image available" src='.$image.'></center>'; ?>   
              </div>    
              <div class="alert-post-image"><?php echo '<center><img style="max-width:100%;max-height:200px" class="product_image" alt="No IDcard image available" src='.$student_idcard.'></center>'; ?>   
              </div>               
             	<div class="alert">
              Graduation Year: <?php echo $student_gradyear; ?><br>
              <?php echo $student_gender; ?><br>
              <?php echo $student_email; ?><br>
              Contact: <?php echo $student_contact; ?></small><br>
              <h4><span class="label label-info"><?php echo $student_type; ?></span></h4>
                    <?
                      if($student_cr_status=="Applied"){
                        echo "<form method='get' action='promote_cr.php'>";
                        echo "<input type='hidden' name='student_username' value=".$student_username.">";
                        echo "<button type='submit' class='btn btn-link'> Promote to CR </button>";
                        echo "</form>";
                    }
                    if($student_cr_status=="Approved"){
                        echo "<form method='get' action='demote_cr.php'>";
                        echo "<input type='hidden' name='student_username' value=".$student_username.">";
                        echo "<button type='submit' class='btn btn-link'> Demote from CR </button>";
                        echo "</form>";
                    }
                    ?> 
                    <?
                      if($student_ban_status=="No"){
                        echo "<form method='post' action='ban_student.php'>";
                          echo "<input type='hidden' name='student_username' value=".$student_username.">";
                          echo "<input type='hidden' name='banned_by_username' value=".$uname.">";  
                          echo "<button type='submit' name='submit' class='btn btn-danger-link'><i class='icon-remove'></i> Ban this student </button>";
                        echo "</form>";
                      }
                      else{
                        echo "<form method='get' action='unban_student.php'>";
                          echo "<input type='hidden' name='student_username' value=".$student_username.">";
                          echo "<input type='hidden' name='banned_by_username' value=".$uname.">";  
                          echo "<button type='submit' name='submit' class='btn btn-danger-link'><i class='icon-remove'></i> Unban this student </button>";
                        echo "</form>";
                      }
                    ?>
              </div>
           
                <div>
                
                  <small>
                    <?
                      if($student_ban_status!="No"){
                        echo "Banned By:". $student_ban_status;
                      }
                    ?>
                  </small>
               
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
                          <br><br>
                          

              
  
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