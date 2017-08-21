<?php
	session_start();
	require "../../common/class/db.php";
	require "../../common/class/ajaxguolv.php";
	$db=new DB;
	if(empty($_SESSION['mid'])){
		$data=array("error"=>2,"msg"=>"请先登陆！");
	}else if(isset($_POST['password'])){
		$mid=$_SESSION['mid'];
		$password=md5($_POST['password']);
		$sql="select id,name,img from admin where id='{$mid}' and password='{$password}'";
		$rs=$db->query($sql);
		if($db->num_rows($rs)<1){
			$data=array("error"=>1,"msg"=>"密码错误！");
		}else{
			$data=array("error"=>0,"msg"=>"密码正确！");
		}
	}else if(isset($_POST['password2'])){
		$mid=$_SESSION['mid'];
		$password2=md5($_POST['password2']);
		$dataArray=array('password'=>$password2);
		$rs=$db->update('admin',$dataArray,"id=$mid");
		if($rs){
			$data=array("error"=>0,"msg"=>"修改成功！");
			session_destroy();
		}else{
			$data=array("error"=>1,"msg"=>"修改失败！");
		}
	}
	echo json_encode($data);
	/*header('Location:index.php');*/
	

?>