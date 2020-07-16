<?php include('header.php');?>    
    <body>
  <?php include('navbar.php'); ?>
      <div id="masthead">  
        <div class="container">
          <center><h4>Alerts: Report suspecious activities and incidents of ragging here.</h4>
          <small style="font-family:courier,'new courier';" class="text-muted">Add "Ragging" in the title in case you're reporting one.</small><br></center><hr>
          <?php include('alert_heading.php'); ?>
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
    collegecode = '$session_collegecode' AND gradyear='$session_gradyear' AND stream='$session_stream' AND type='Alert' AND status = 'Approved'
    OR
    collegecode = '$session_collegecode' AND gradyear='0' AND stream='$session_stream' AND type='Alert' AND status = 'Approved'
    OR
    collegecode = '$session_collegecode' AND gradyear='$session_gradyear' AND stream='all' AND type='Alert' AND status = 'Approved'
    OR
    collegecode = '$session_collegecode' AND gradyear='0' AND stream='all' AND type='Alert' AND status = 'Approved'"; 
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

  $query = $conn->query("select * from post where 
    collegecode = '$session_collegecode' AND gradyear='$session_gradyear' AND stream='$session_stream' AND type='Alert' AND status = 'Approved'
    OR
    collegecode = '$session_collegecode' AND gradyear='0' AND stream='$session_stream' AND type='Alert' AND status = 'Approved'
    OR
    collegecode = '$session_collegecode' AND gradyear='$session_gradyear' AND stream='all' AND type='Alert' AND status = 'Approved'
    OR
    collegecode = '$session_collegecode' AND gradyear='0' AND stream='all' AND type='Alert' AND status = 'Approved'
    order by post_id DESC limit $starting_limit,$limit ");
  while($row = $query->fetch()){
  $username = $row['poster_username'];
  $poster_name = $row['poster_name'];
  $date_posted = $row['date_posted'];
  $id = $row['post_id'];
  $p_unique_id = $row['p_unique_id'];
  $member_id_post = $row['member_id'];
  $photo = $row['photo'];
  $file = str_replace(" ", '%20', $row['file']);
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


             
             	<div class="alert">
                    <form method="get" action="all_comments.php">
                        <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                        <input type="hidden" name="p_unique_id" value="<?php echo $p_unique_id; ?>">
                        <button type="submit" class="btn btn-link"> View all </button>
                    </form>
                </div>
           
              	<div>              
                <div>
                  <h4><span class="label label-info"> <?php echo $date_posted; ?></span></h4></div>                
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