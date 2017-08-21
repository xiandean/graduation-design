<?php
	session_start();
	require "../../common/class/db.php";
	require "../../common/class/ajaxguolv.php";
	$db=new DB;
	if(empty($_SESSION['uid'])){
		$data=array("error"=>2,"msg"=>"请先登陆！");
	}else if(isset($_POST['action'])&&$_POST['action']=='post'){
		$uid=$_SESSION['uid'];
		$u_name=$_SESSION['username'];
		$content=$_POST['content'];
		date_default_timezone_set('PRC');
      	$p_date=date('Y-m-d');
      	$dataArray=array('u_name'=>$u_name,'content'=>$content,'p_date'=>$p_date);
      	$rs=$db->insert('jianyi',$dataArray);
		if($rs)
			$data=array("error"=>0,"msg"=>"提交成功!");
		else
			$data=array("error"=>1,"msg"=>"提交失败！");
	}
	echo json_encode($data);
?>
