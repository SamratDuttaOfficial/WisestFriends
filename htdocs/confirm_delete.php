<?php
include('dbcon.php');
include('session.php');
include('header.php');

		$post_id = $_GET['post_id'];
		$p_unique_id=$_GET["p_unique_id"];

?>
<div class="col-md-10 col-sm-9">
<div><form method="GET" action="delete_post.php">
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <input type="hidden" name="p_unique_id" value="<?php echo $p_unique_id; ?>">
            Do you really want to delete this post? Deleting an post cannot be undone.           
            <button type="submit" name="submit" class="btn btn-danger"><i class="icon-remove"></i> Delete Post </button>
      </form></div>
</div>      

