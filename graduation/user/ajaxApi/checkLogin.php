<?php

	session_start();
	require "../../common/class/db.php";
	require "../../common/class/ajaxguolv.php";
	$db=new DB;
	$username=$_POST['name'];
	$password=md5($_POST['password']);
	$code=$_POST['code'];
	$log=fopen('lglog.txt','a+');
	$cliendIp=$db->getip();
	if(strcasecmp($code,$_SESSION['code'])!=0){
		$data=array("error"=>2,"msg"=>"验证码不正确！");
		echo json_encode($data);
		exit;
	}
	$sql="select id,name,img from user where name='{$username}' and password='{$password}'";
	$rs=$db->query($sql);
	date_default_timezone_set('PRC');
	if($db->num_rows($rs)<1){
		$data=array("error"=>1,"msg"=>"用户名或密码错误！");
	}else{
		unset($_SESSION['code']);
		$userinfo=$db->fetch_array($rs);
		$_SESSION['uid']=$userinfo['id'];
		$_SESSION['username']=$userinfo['name'];
		if(!$userinfo['img']){
			$headImg="upload_img/default.jpg";
		}else{
			$headImg=$userinfo['img'];
		}
		$_SESSION['headImg']=$headImg;
		if(!empty($_POST['auto'])){     
			setcookie("username", $username, time()+3600*24*7);  
			setcookie("password", $password, time()+3600*24*7);  
		}else{
			setcookie("username", "", time()-3600);
			setcookie("password", "", time()-3600);
		}
		$data=array("error"=>0,"msg"=>"登陆成功！");
		fwrite($log,"用户名：".$username."用户IP："." $cliendIp "."登录时间：".date("Y-m-d H:i:s")."\r\n");
	}
	echo json_encode($data);
	/*header('Location:index.php');*/
	

?>