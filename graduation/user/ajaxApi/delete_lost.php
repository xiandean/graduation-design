<?php
	session_start();
	if(!isset($_SESSION['uid'])||!isset($_GET['type'])||!isset($_GET['l_id'])){
		$data=array("error"=>2,"msg"=>"删除失败！");
		echo json_encode($data);
		exit;
	}
	
	require "../../common/class/db.php";
	require "../../common/class/ajaxguolv.php";
	$db=new DB;
	$uid=$_SESSION['uid'];
  	$type=$_GET['type'];
  	$type2=$type==0?1:0;
  	$table=$type==0?'found':'lost';
  	$l_id=$_GET['l_id'];
  	$result=$db->get_one("select * from $table where l_id=$l_id and u_id=$uid");
	$rs=$db->delete($table,"l_id=$l_id and u_id=$uid");
	if($rs){
		if($result['ct_state']==1){
			$rs2=$db->delete('q_manage',"u_id=$uid and q_id in (select q_id from validation where l_type=$type and l_id=$l_id)");
			$rs3=$db->delete('validation',"l_type=$type and l_id=$l_id");
		}
		$rs4=$db->delete('result',"l_type=$type and l_id=$l_id");
		$rs5=$db->delete('pull',"(l_type=$type and r_id=$l_id) or (l_type=$type2 and s_id=$l_id)");
		$rs5=$db->delete('xiansuo',"l_type=$type and l_id=$l_id");
		$data=array("error"=>0,"msg"=>"删除成功！");
		echo json_encode($data);
	}else{
		$data=array("error"=>1,"msg"=>"删除失败！");
		echo json_encode($data);
	}


?>