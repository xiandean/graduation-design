<?php
	
	session_start();
	require "../../common/class/db.php";
	//require "../common/class/ajaxguolv.php";
	$db=new DB;
	if(empty($_SESSION['uid'])){
		$data=array("error"=>2,"msg"=>"请先登陆！");
	}else if(!isset($_GET['confirm'])||!isset($_GET['r_id'])){
		$data=array("error"=>3,"msg"=>"未知错误！");	
	}else{
		$confirm=$_GET['confirm'];
		$r_id=$_GET['r_id'];
		
		$sql="select * from result where r_id=$r_id";
		$rs=$db->get_one($sql);
		if($rs){
			$u_id=$rs['u_id'];
			$l_id=$rs['l_id'];
			$l_type=$rs['l_type'];
			$sql2="select q_manage.q_id from validation right join q_manage on validation.q_id=q_manage.q_id where validation.l_id=$l_id and validation.l_type=$l_type and q_manage.u_id=$u_id";
			$question=$db->get_all($sql2);
			$q_ids='';
			if($question){
				foreach ($question as $key => $value) {
					if($key==0){
						$q_ids=$value['q_id'];
					}else{
						$q_ids=$q_ids.','.$value['q_id'];
					}
				}
				$rs2=$db->delete('q_manage',"q_id in($q_ids) and u_id=$u_id");
				
			}
			if($confirm=='yes'){
				$table=$l_type==0?'found':'lost';
				date_default_timezone_set('PRC');
      			$rl_date=date('Y-m-d');
				$sql3="select $table.l_name,$table.l_img,$l_type as l_type,$table.l_feature,$u_id as rl_uid,$table.u_id,'$rl_date' as rl_date from $table where l_id=$l_id";
				$rs3=$db->get_one($sql3);
				if($rs3){
					$rs4=$db->insert('renling',$rs3);
					if($rs4){
						$rs5=$db->delete($table,"l_id=$l_id");
					}
				}
			}
			$rs2=$db->delete('result',"r_id=$r_id");
			$data=array("error"=>0,"msg"=>"处理成功！");
		}else{
			$data=array("error"=>1,"msg"=>"找不到该记录");
		}
		
	}
	echo json_encode($data);
?>
