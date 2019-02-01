<?php
    ob_start();
		
	include($_SERVER['DOCUMENT_ROOT']."/fishshop/config.php");

	// Opens a connection to a MySQL server
	$connection=mysql_connect ($dbhost, $dbusername,$dbpass);
	if (!$connection) {
	  die('Not connected : ' . mysql_error());
	}

	// Set the active MySQL database
	$db_selected = mysql_select_db($dbname, $connection);
	if (!$db_selected) {
	  die ('Can\'t use db : ' . mysql_error());
	} 
	
	$eventCode = $_POST['eventCode'];
$eventDate = $_POST['eventDate'];
$eventDescription = $_POST['eventDescription'];
	 
		$result = mysql_query("insert into events values ('$eventCode','$eventDate','$eventDescription')");
		
		
				
			?>							
				<script language="javascript" type="text/javascript">
					alert('Event <?php echo $eventCode ?>  successfully added.');								
				</script>
			<?php						
					
		//header("Location: admin.php");
		//header("Location: ".htmlentities($_SERVER['HTTP_REFERER']));					
		header('Refresh:2; admin.php');
		ob_end_flush();
      ?>


