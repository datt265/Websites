<?php session_start();

ob_start();

//Array to store validation errors
	$errmsg_arr = array();
	
//Validation error flag
	$errflag = false;
	
//Get database credentials
	require 'config.php';

$link = mysql_connect($dbhost, $dbusername,$dbpass);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname, $link);

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysql_real_escape_string($str);
}
	
	//Sanitize the POST values
	
	
	// Generate Guid 
	$login = clean($_POST['username']);
	$password = clean($_POST['password']);
		
	$qry="SELECT username,password FROM users where username ='$login' and password = '$password'";
	$result = mysql_query($qry);
		
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			//$_SESSION['SESS_FIRST_NAME'] = $member['username'];
			//$_SESSION['SESS_MEMBER_ID'] = $member['password'];			
			$name = $member['username'];
						
			$_SESSION['userlogin'] = $name;
			
			//echo $_SESSION['userlogin'] = $name;
			
			$_SESSION['SESS_STATUS_ADMIN'] = "ADMINOK";
			
			//echo $_SESSION['SESS_STATUS_ADMIN'] = "ADMINOK";
			echo "true";
			session_write_close();		
			//echo "true";
			//header("Location: admin.php");
			//header('Refresh:2; admin.php');
			exit();
			
		}else {
			//Login failed
			//echo("Invalid Username or Password");	
			echo "false";
			//header("Location: pcfailed.php");
			session_write_close();	
			exit();
		}
	}else {
		die("Query failed");
	}
	
	ob_end_flush();
	
?>




