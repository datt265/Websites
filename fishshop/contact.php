<?php
session_start();
if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
 {
  //echo "Correct Code Entered";
  
  $erors = array();                      // set an empty array that will contains the errors
  $regexp_mail = '/^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/';         // an e-mail address pattern  
  
  
  // check if all form fields are filled in correctly
  // (check if name minimum number of characters is valid)
  if (strlen($_POST['cf_name'])<2) $erors[] = 'Invalid Name';
  // (email address and the minimum number of characters in "message")
  if (!preg_match($regexp_mail, $_POST['cf_email'])) $erors[] = 'Invalid e-mail address'; 
  if (strlen($_POST['cf_message'])<5) $erors[] = 'Message too short';
    
  // if no errors ($error array empty)
  if(count($erors)<1) {        
    $field_name = $_POST['cf_name'];
    $field_email = $_POST['cf_email'];
    $field_message = $_POST['cf_message'];
    $field_userip = $_SERVER['REMOTE_ADDR'];   
    
    $mail_to = 'myEmail@gmail.com';
    $subject = 'Message from Aquatic Centre : '.$field_name;
    
    $body_message = 'From: '.$field_name."\n";
    $body_message .= 'E-mail: '.$field_email."\n";
    $body_message .= 'User IP: '.$field_userip."\n";
    $body_message .= 'Message: '.$field_message;
    
    $headers = 'From: '.$field_email."\r\n";
    $headers .= 'Reply-To: '.$field_email."\r\n";
    
    $mail_status = mail($mail_to, $subject, $body_message, $headers);
  }


  if ($mail_status) { //data correct
	?>
		<script language="javascript" type="text/javascript">
		  alert('Thank you for the message. We will contact you shortly.');
		  window.location = 'home.html';
		</script>
	<?php
	} 
  else {    
	foreach ($erors as $key => $values) {?>
	 <script language="javascript" type="text/javascript">
	       alert(' <?php  echo '' . $values . ''; ?>');
		   window.location = 'contacts.html';
	 </script>
	 <?php
	 } //end foreach
	} //end else 
	} //end if
	else
	{
	?>
	  <script language="javascript" type="text/javascript">
		alert('Captcha Verification Failed');
		window.location = 'contacts.html';
	  </script>
	<?php
	} //end else
	?>
