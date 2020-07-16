<?php
if (isset($_POST['submit'])) {
    $year = htmlspecialchars($_POST['year']);
    $month = htmlspecialchars($_POST['month']);
    $date = htmlspecialchars($_POST['date']);
  }
   $y_strlen = strlen($year);
   $m_strlen = strlen($month);
   $d_strlen = strlen($date);
    
    if ($y_strlen<2){
    $date_posted = "";
  }
    elseif ($m_strlen<2){
    $date_posted = $year;
  }
    elseif ($d_strlen<2){
    $date_posted = $year."-".$month;
  }
   else{
    $date_posted = $year."-".$month."-".$date;
   }
?>
<?php include('header.php');?>  
<?php
$query = $conn->query("select SUM(photo_size),COUNT(photo_size) from post where member_id = '$session_id' AND type='listed' AND date_posted LIKE '$date_posted%' order by post_id DESC");
  while($row = $query->fetch()){
    $sum = $row['SUM(photo_size)'];
    $count = $row['COUNT(photo_size)'];
}
?>  
    <body>
  <?php include('navbar.php'); ?>
      <div id="masthead">  
        <div class="container">
          <?php include('view_my_posts_heading.php'); ?>
          <? echo "$date_posted";?> <h5><b>No. of posts: </b><? echo "$count";?></h5> 
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

$query = "SELECT * FROM post where member_id = '$session_id' AND date_posted LIKE '$date_posted%' AND type='listed'"; 
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

  $query = $conn->query("select * from post where member_id = '$session_id' AND date_posted LIKE '$date_posted%' order by post_id DESC limit $starting_limit,$limit ");
  while($row = $query->fetch()){
  $username = $row['poster_username'];
  $poster_name = $row['poster_name'];
  $date_posted = $row['date_posted'];
  $id = $row['post_id'];
  $member_id_post = $row['member_id'];
  $photo = str_replace(" ", '%20', $row['photo']);
  ?>
        <div class="col-sm-post">
              <div class="alert-post"><b><?php echo $row['title']; ?></b><br><?php echo $row['content']; ?></div>             
                <div class="alert-post-image"><?php echo '<center><img style="max-width:100%;max-height:200px" class="product_image" alt=" Post Image" src='.$photo.'></center>'; ?>   
                </div>                    


             
              <div class="alert">
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