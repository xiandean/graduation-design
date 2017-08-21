<?php
	session_start();
	require "../../common/class/db.php";
	require "../../common/class/ajaxguolv.php";
	$db=new DB;
	if(empty($_SESSION['uid'])){
		$data=array("error"=>2,"msg"=>"请先登陆！");
	}else if(isset($_POST['title'])){
		$u_name=$_SESSION['username'];
		$title=$_POST['title'];
		$content=$_POST['content'];
		date_default_timezone_set('PRC');
      	$p_date=date('Y-m-d');
		$rs=$db->insert('thanks',array("title"=>$title,"context"=>$content,"u_name"=>$u_name,"p_date"=>$p_date,"checked"=>0));
		if($rs){
			$data=array("error"=>0,"msg"=>"发布成功！");
		}else{
			$data=array("error"=>1,"msg"=>"发布失败！");
		}
	}
	echo json_encode($data);
?>
