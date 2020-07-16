<?php include('header.php');?>
<?php $posted_image=$_POST["posted_image"]; 
?>
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
        <br>
		<div class="container">
  			<div class="row">
    			<div class="col-md-12"> 
      				<div class="panel">
        				<div class="panel-body">
            				<button onclick="goBack()" type="button" class="btn btn-primary active"> Go Back </button><br>
            				<script>
            					function goBack() {
            					window.history.back();
           	 					}
            				</script>
               				<div class="alert">
              					<?php echo '<img style="width:100%;height:100%" alt="Image" src='.$posted_image.' />'; 
                              echo '<br><hr>';
                              echo '<a href="'.$posted_image.'" download="'.$posted_image.'"> Download Attached Image </a>';

                              
?>
                          		<br>
                          		<br>
                          	</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                                                               
		<?php include('footer.php'); ?>
        
    </body>
</html>