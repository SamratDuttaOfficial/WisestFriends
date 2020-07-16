<?php include('header.php');?>
 <body>
	<?php include('navbar.php'); ?>
			<div id="masthead">  
				<div class="container">
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
        <h5>You can send mails to any user by their username.</h5>
        <h5>Use the mailing service only when it's necessary.</h5><hr>
          <!--/stories-->
          <div class="row">    
            <br>           

            <div class="col-md-6 col-sm-3 text-center">
								<form method="post" id="send_message" action="send_mail.php">
										<div class="control-group">
											<label>To:</label>
                                          <div class="controls">
                                            <input type="text" id="qty" name="receiver_username" placeholder="Username" maxlength="100" required></textarea>
											
                                          </div>
                                        </div>
								
							
										<div class="control-group">
											<label>Content:</label>
                                          <div class="controls">
											<textarea name="my_message" class="my_message" id="my_message" maxlength="100" required></textarea>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
												<button  class="btn btn-success"><i class="icon-envelope-alt"></i> Send </button>

                                          </div>
                                        </div>
                                </form>

            </div>
            <div class="col-md-6 col-sm-9">
             	<b>Inbox</b>
				<hr>
				<?php 
				$limit = 10;

$query = "SELECT * FROM message where reciever_id = '$session_id'"; 
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
				$query = $conn->query("select * from message
				LEFT JOIN members on message.sender_id = members.member_id where reciever_id = '$session_id' order by message_id DESC limit $starting_limit,$limit ");
				while($row = $query->fetch()){
				$id = $row['message_id'];
				
				?>
				<div class="mes">
				<div class="message"><?php echo $row['content']; ?>
				<hr>
				<div class="pull-left"><?php echo $row['date_sended']; ?></div>
				<div class="pull-right">Sent by: <?php echo $row['firstname']." ".$row['lastname']; ?></div><br>
				<div class="pull-right">Username: <?php echo $row['username']; ?></div>
				<hr>
				<br>
				<a href="delete_message.php<?php echo '?id='.$id; ?>" class="btn btn-danger-link"><i class="icon-remove"></i> Remove</a>
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