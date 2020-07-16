<?php $post_id=$_GET["post_id"]; ?>
<?php $p_unique_id=$_GET["p_unique_id"]; ?>
<?php include('header.php'); ?>    
<?php include('session.php'); ?> 
<style>
.alert a:link, .alert a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

.alert a:hover, .alert a:active {
  background-color: #e32727;
}
</style>
    <body>
  <?php include('navbar.php'); ?>


        <div class="container">
          <div class="row">


          </div><hr><br>


<div class="container">
  <div class="row">
    <div class="col-md-12"> 
      <div class="panel">
        <div class="panel-body">
            <button onclick="goBack()" type="button" class="btn btn-primary active"> Go Back </button> 
            <script>
            function goBack() {
            window.history.back();
            }
            </script>
          <!--/stories-->
          <div class="row">    
            <br>
        <?php
        
  $query = $conn->query("select * from post where post_id='$post_id' AND p_unique_id='$p_unique_id' ");
  while($row = $query->fetch()){
  $post_posted_by = $row['poster_name'];
  $poster_username = $row['poster_username'];
  $date_posted = $row['date_posted'];
  $id = $row['post_id'];
  $member_id_post = $row['member_id'];
  $photo = $row['photo'];
  $file = str_replace(" ", '%20', $row['file']);
  $poster_photo = $row['poster_photo'];
  $poster_roll = $row['roll'];
  $poster_contact = $row['contact_no'];
  $type = $row['type'];
  ?>
            <div class="col-md-2 col-sm-3 text-center"><hr>
              <? if($type=="Alert" && $session_type=="Student" || $type=="Alert" && $session_type=="CR" || $type=="Alert" && $session_type=="Unverified teacher")
                  echo "Anonymous";
                 else
                  echo "<img style='max-width:80px;max-height:80px' alt='Profile Image' src='".$poster_photo."' />";
              ?>             
            </div>
            <div class="col-md-10 col-sm-9">
              <div class="alert"><b><?php echo $row['title']; ?></b></div>
              <div class="alert"><?php echo $row['content']; ?></div>
              <div class="alert">
              <?
                if($photo==1){
                  echo '<form method="post" action="viewimage.php">';
                  echo '<input type="hidden" name="posted_image" value="'.$file.'"><br>';            
                  echo '<input type="image" style="max-width:400px;max-height:400px" alt="Post Image" src="'.$file.'" />';
                  echo '</form>';
                  echo '<a href="'.$file.'" download="'.$file.'"> Download Attached Image </a>';
                }
                if($photo==2){ 
                  echo '<a href="'.$file.'"> Download Attached PDF </a>'; 
                } 
              ?>
            </div> <hr>
              <div class="col-md-10 col-sm-9">     
              <div class="alert"><?php
              $query2 = $conn->query("select * from comments where post_id=$id order by post_id DESC limit 5");
  while($row2 = $query2->fetch()){
    $id = $row2['post_id'];
    $date_posted = $row2['posted_at'];
    $member_id = $row2['member_id'];

$query3 = $conn->query("select * from members where member_id = $member_id");
  while($row3 = $query3->fetch()){
  $comment_posted_by = $row3['firstname']." ".$row3['lastname'];
  $photo = $row3['image'];
  $member_id = $row3['member_id'];

                            
                 echo "<div>".$row2['comment']."</div>"."<span class='label label-info'>".$date_posted."</span>";
                 if($type=="Alert" && $session_type=="Student" || $type=="Alert" && $session_type=="CR" || $type=="Alert" && $session_type=="Unverified teacher")
                  echo "<small style='font-family:courier,'new courier';' class='text-muted'>Posted by: Anonymous</small>";
                 else
                  echo "<small style='font-family:courier,'new courier';' class='text-muted'>Posted By: ".$comment_posted_by."  @".$row3['username']."</small>";
                   }} ?>
                     
                   
                   </div>
              
              
            <hr><form method="post" action="postcomment.php">
            <input type="hidden" name="post_id" value="<?php echo $id; ?>">
            <textarea id= "styled" maxlength="1000" name="comment" placeholder="Write a Comment."></textarea>
            <br>
            <button type="submit" name="submit" class="btn btn-success"><i class="icon-share"></i> Comment </button>
             <small style="font-family:courier,'new courier';" class="text-muted">Caution: You can't delete your comment.</small>
      </form>

              <div>
                <div>
                  <h4><span class="label label-info"> <?php echo $date_posted; ?></span></h4>                  
                  <? if($type=="Alert" && $session_type=="Student" || $type=="Alert" && $session_type=="CR" || $type=="Alert" && $session_type=="Unverified teacher")
                  echo "<small>Anonymous</small>";
                 else if($type == "Alert" && $session_type=="Verified Teacher")
                  echo "<small class='text-muted'>Posted By: ".$post_posted_by." @".$poster_username." Roll: ".$poster_roll." Contact: ".$poster_contact."</small>";
              	 else 
              	  echo "<small class='text-muted'>Posted By: ".$post_posted_by." @".$poster_username."</small>";
              ?>    



                  
                  </h4></div>
                
              </div>
              </div>
              


            </div>
  <?php } ?>  

                          <br><br>
                          <div class="col-md-2 col-sm-3 text-center">
             
            </div>

              
  
          </div>
          <hr>
        </div>
      </div>
       <script type="text/javascript">
         function myFunctionCopy() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("Copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
       </script>                                                                               
                                                  
                                                      
    </div><!--/col-12-->
  </div>
</div>
                                                
                                                                                
<?php include('footer.php'); ?>
        
    </body>
</html>