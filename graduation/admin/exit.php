<?php

	session_start();
	session_destroy();
	
	header("Location:m_login.php");
	
?>
