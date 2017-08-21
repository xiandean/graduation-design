<?php
session_start();
if(empty($_SESSION['mname'])){
		header('Location:m_login.php');
}else{
	$mid=$_SESSION['mid'];
	$mname=$_SESSION['mname'];
	$mheadImg=$_SESSION['mheadImg'];
}

  
?>