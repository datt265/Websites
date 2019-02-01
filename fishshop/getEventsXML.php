<?php

include($_SERVER['DOCUMENT_ROOT']."/fishshop/config.php");



function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','<',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 

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
  
//$query= "SELECT * FROM details";
 $query= "SELECT * FROM (SELECT * FROM events ORDER BY eventDate DESC LIMIT 0 , 3)latestEvents ORDER BY eventDate  ASC";
// $query= "SELECT eventCode, eventDate, eventDescription FROM events ORDER BY eventDate limit 3 ";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
  
 header("Content-type: text/xml");


// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
    // ADD TO XML DOCUMENT NODE
    echo '<marker ';
  
  echo 'eventCode="' . parseToXML($row['eventCode']) . '" ';
	echo 'eventDate="' . parseToXML($row['eventDate']) . '" ';
   echo 'eventDescription="' . parseToXML($row['eventDescription']) . '" ';
	
   echo '/>';
}

// End XML file
echo '</markers>';

?>