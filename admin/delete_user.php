<?php
	
	include('../php/dbconn.php');
	
	$id=$_GET['user_id'];
	
	$delete = "DELETE FROM user WHERE user_id='$id'";
	$result = mysqli_query($dbconn, $delete) or die ("Error: " . mysqli_error($dbconn));
	//echo $delete;
	
	if ($result) {
	  ?>
	  <script type="text/javascript">
	  	window.location = "index.php"
	  </script>
	  <?php }
    
    else
    {
      echo $update;
	?> 
	  <script type="text/javascript">
	  	window.location = "index.php"
	  </script>
	<?php       
     } 
	
?>