<?php
	session_start();
	require "../../common/class/ajaxguolv.php";

	if(isset($_SESSION['mid'])){
		require "../../common/class/db.php";
		$db=new DB;
	  	$ids=$_POST['ids'];
	  	$rs=$db->update('thanks',array("checked"=>1),"t_id in ($ids)");
	  	if($rs){
	  		$data=array("error"=>0,"msg"=>"审核成功！");
			echo json_encode($data);
	  	}else{
	  		$data=array("error"=>1,"msg"=>"审核失败！");
			echo json_encode($data);
	  	}
	}

?>