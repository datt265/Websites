 <?php 
  //Get database credentials
  require 'config.php';


$link = mysql_connect($dbhost, $dbusername, $dbpass); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
} 
echo 'Connected successfully'; 

mysql_select_db($dbname, $link)or die('Cannot select database');
	
	// Create table users
	$sql = "CREATE TABLE IF NOT EXISTS users
	(		
		username varchar(15) COLLATE latin1_general_ci NOT NULL primary key,
		password varchar(15) COLLATE latin1_general_cs		
	) ENGINE=InnoDB; ";	

	// Execute query
	mysql_query($sql,$link);

	echo 'Table Users created'; 
	
	//Create admin login
	$sql = "INSERT INTO users (username, password) VALUES('admin','letmein');";
	
	// Execute query
	mysql_query($sql,$link);
	
	// Create table menu
	$sql = "CREATE TABLE IF NOT EXISTS menu
	(	
		category varchar(9),
		sub_category varchar(25),
		description varchar(100),
		price DECIMAL(10,2) 
	) ENGINE=InnoDB; ";	

	// Execute query
	mysql_query($sql,$link);	

	echo 'Table menu created'; 

mysql_select_db($dbname); 
?> 

