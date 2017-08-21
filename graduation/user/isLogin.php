<?php
session_start();
if(empty($_SESSION['username'])){
	if(empty($_COOKIE['username']) || empty($_COOKIE['password'])){  //如果session为空，并且用户没有选择记录登录状
		$uid='';
		$username='';
		$headImg='upload_img/default.jpg';
	}else{
		$username=$_COOKIE['username'];
		$password=$_COOKIE['password'];
		require "../common/class/db.php";
		$db=new DB;
		$sql="select id,name,img from user where name='{$username}' and password='{$password}'";
		$rs=$db->query($sql);
		if($db->num_rows($rs)<1){
			$uid='';
			$username='';
			$headImg='upload_img/default.jpg';
		}else{
			$userinfo=$db->fetch_array($rs);
			$uid=$userinfo['id'];
			if(!$userinfo['img']){
    			$headImg="upload_img/default.jpg";
			}else{
				$headImg=$userinfo['img'];
			}
			$_SESSION['uid']=$uid;
			$_SESSION['username']=$username;
			$_SESSION['headImg']=$headImg;
			
		}
	}
	
}else{
	$uid=$_SESSION['uid'];
	$username=$_SESSION['username'];
	$headImg=$_SESSION['headImg'];
}

  
?>