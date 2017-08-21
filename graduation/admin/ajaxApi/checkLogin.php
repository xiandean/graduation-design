<?php

	session_start();
	require "../../common/class/db.php";
	require "../../common/class/ajaxguolv.php";
	$db=new DB;
	$mname=$_POST['name'];
	$password=md5($_POST['password']);
	$code=$_POST['code'];
	$log=fopen('lglog.txt','a+');
	$cliendIp=$db->getip();
	if(strcasecmp($code,$_SESSION['code'])!=0){
		$data=array("error"=>2,"msg"=>"验证码不正确！");
		echo json_encode($data);
		exit;
	}
	$sql="select id,name,img from admin where name='{$mname}' and password='{$password}'";
	$rs=$db->query($sql);
	date_default_timezone_set('PRC');
	if($db->num_rows($rs)<1){
		$data=array("error"=>1,"msg"=>"账户名或密码错误！");
	}else{
		unset($_SESSION['code']);
		$userinfo=$db->fetch_array($rs);
		$_SESSION['mid']=$userinfo['id'];
		$_SESSION['mname']=$userinfo['name'];
		if(!$userinfo['img']){
			$mheadImg="upload_img/default.jpg";
		}else{
			$mheadImg=$userinfo['img'];
		}
		$_SESSION['mheadImg']=$mheadImg;
		
		$data=array("error"=>0,"msg"=>"登陆成功！");
		fwrite($log,"管理员：".$mname."账户IP："." $cliendIp "."登录时间：".date("Y-m-d H:i:s")."\r\n");
	}
	echo json_encode($data);
	/*header('Location:index.php');*/
	

?>