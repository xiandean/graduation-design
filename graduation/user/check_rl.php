<?php
	session_start();
	require "../common/class/db.php";
	$db=new DB;
	if(empty($_SESSION['uid'])){
		header("Location:login.php");
		exit;
	}else{ 
		$uid=$_SESSION['uid'];
		$rs=$db->update('renling',array("check_state"=>1),"(rl_uid=$uid and l_type=0 and check_state=0) or (u_id=$uid and l_type=1 and check_state=0)");
		if($rs){
			header("Location:ucenter.php?p=list&action=records");
		}
	}
?>
