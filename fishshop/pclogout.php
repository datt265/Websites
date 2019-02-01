<?php 
session_start();

	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['userlogin']);
	unset($_SESSION['SESS_STATUS_ADMIN']);
	unset($_SESSION['SESS_STATUS_USER']);
	unset($_SESSION['SESS_STATUS_MESSAGE']);
	
	header('Location:home.html');
?>	