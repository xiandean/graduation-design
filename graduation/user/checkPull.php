<?php
	session_start();
	if(empty($_SESSION['uid'])){
		header("Location:login.php");
	}else if(isset($_GET['pull_id'])&&!empty($_GET['pull_id'])){
		require "../common/class/db.php";
		$db=new DB;
		$pull_id=$_GET['pull_id'];
		$l_id=$_GET['l_id'];
		$type=$_GET['type'];
		$dataArray=array('state'=>1);
		$rs=$db->update('pull',$dataArray,"pull_id=$pull_id");
		if($rs){
			header("Location:detail.php?type=$type&l_id=$l_id");
		}
	}

?>