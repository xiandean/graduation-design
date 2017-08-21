<?php
	session_start();
	require "../../common/class/ajaxguolv.php";
	if(isset($_GET['action'])&&$_GET['action']=='m'){
		if(isset($_SESSION['mid'])&&$_SESSION['mid']==1){
			require "../../common/class/db.php";
			$db=new DB;
			$mid=$_SESSION['mid'];
		  	$ids=$_POST['ids'];
		  	$rs=$db->delete('admin',"id in ($ids)");
		  	if($rs){
		  		$data=array("error"=>0,"msg"=>"删除成功！");
				echo json_encode($data);
		  	}else{
		  		$data=array("error"=>1,"msg"=>"删除失败！");
				echo json_encode($data);
		  	}
		}
	}else if(isset($_GET['action'])&&$_GET['action']=='u'){
		if(isset($_SESSION['mid'])){
			require "../../common/class/db.php";
			$db=new DB;
		  	$ids=$_POST['ids'];
		  	$rs=$db->delete('user',"id in ($ids)");
		  	if($rs){
		  		$data=array("error"=>0,"msg"=>"删除成功！");
				echo json_encode($data);
		  	}else{
		  		$data=array("error"=>1,"msg"=>"删除失败！");
				echo json_encode($data);
		  	}
		}
	}else if(isset($_GET['action'])&&$_GET['action']=='l'){
		if(isset($_SESSION['mid'])){
			require "../../common/class/db.php";
			$db=new DB;
		  	$l_ids=$_POST['l_ids'];
		  	$f_ids=$_POST['f_ids'];
		  	$flag=true;
		  	if($l_ids){
		  		$result=$db->get_all("select * from lost where l_id in ($l_ids)");
				$rs=$db->delete('lost',"l_id in ($l_ids)");
				if($rs){
					foreach ($result as $key => $value) {
						$uid=$value['u_id'];
						$type=1;
						$type2=0;
						$l_id=$value['l_id'];
						if($value['ct_state']==1){
							$rs2=$db->delete('q_manage',"u_id=$uid and q_id in (select q_id from validation where l_type=$type and l_id=$l_id)");
							$rs3=$db->delete('validation',"l_type=$type and l_id=$l_id");
						}
						$rs4=$db->delete('result',"l_type=$type and l_id=$l_id");
						$rs5=$db->delete('pull',"(l_type=$type and r_id=$l_id) or (l_type=$type2 and s_id=$l_id)");
						$rs5=$db->delete('xiansuo',"l_type=$type and l_id=$l_id");
						
					}
					// $data=array("error"=>0,"msg"=>"删除成功！");
					// echo json_encode($data);
				}else{
					$flag=false;
				}
		  	}
		  	if($f_ids){
		  		$result2=$db->get_all("select * from found where l_id in ($f_ids)");
				$rs2=$db->delete('found',"l_id in ($f_ids)");
				if($rs2){
					foreach ($result2 as $key => $value) {
						$uid=$value['u_id'];
						$type=0;
						$type2=1;
						$l_id=$value['l_id'];
						if($value['ct_state']==1){
							$rs2=$db->delete('q_manage',"u_id=$uid and q_id in (select q_id from validation where l_type=$type and l_id=$l_id)");
							$rs3=$db->delete('validation',"l_type=$type and l_id=$l_id");
						}
						$rs4=$db->delete('result',"l_type=$type and l_id=$l_id");
						$rs5=$db->delete('pull',"(l_type=$type and r_id=$l_id) or (l_type=$type2 and s_id=$l_id)");
						$rs5=$db->delete('xiansuo',"l_type=$type and l_id=$l_id");
						
					}
					
				}else{
					$flag=false;
				}
		  	}
			

			if($flag){
				$data=array("error"=>0,"msg"=>"删除成功！");
				echo json_encode($data);
			}else{
				$data=array("error"=>1,"msg"=>"删除失败！");
				echo json_encode($data);
			}
		}
	}
	else if(isset($_GET['action'])&&$_GET['action']=='n'){
		if(isset($_SESSION['mid'])){
			require "../../common/class/db.php";
			$db=new DB;
		  	$ids=$_POST['ids'];
		  	$rs=$db->delete('announce',"a_id in ($ids)");
		  	if($rs){
		  		$data=array("error"=>0,"msg"=>"删除成功！");
				echo json_encode($data);
		  	}else{
		  		$data=array("error"=>1,"msg"=>"删除失败！");
				echo json_encode($data);
		  	}
		}
	}
	else if(isset($_GET['action'])&&$_GET['action']=='leave'){
		if(isset($_SESSION['mid'])){
			require "../../common/class/db.php";
			$db=new DB;
		  	$ids=$_POST['ids'];
		  	$rs=$db->delete('jianyi',"id in ($ids)");
		  	if($rs){
		  		$data=array("error"=>0,"msg"=>"删除成功！");
				echo json_encode($data);
		  	}else{
		  		$data=array("error"=>1,"msg"=>"删除失败！");
				echo json_encode($data);
		  	}
		}
	}
	else if(isset($_GET['action'])&&$_GET['action']=='t'){
		if(isset($_SESSION['mid'])){
			require "../../common/class/db.php";
			$db=new DB;
		  	$ids=$_POST['ids'];
		  	$rs=$db->delete('thanks',"t_id in ($ids)");
		  	if($rs){
		  		$data=array("error"=>0,"msg"=>"删除成功！");
				echo json_encode($data);
		  	}else{
		  		$data=array("error"=>1,"msg"=>"删除失败！");
				echo json_encode($data);
		  	}
		}
	}
	else if(isset($_GET['action'])&&$_GET['action']=='rl'){
		if(isset($_SESSION['mid'])){
			require "../../common/class/db.php";
			$db=new DB;
		  	$ids=$_POST['ids'];
		  	$rs=$db->delete('renling',"id in ($ids)");
		  	if($rs){
		  		$data=array("error"=>0,"msg"=>"删除成功！");
				echo json_encode($data);
		  	}else{
		  		$data=array("error"=>1,"msg"=>"删除失败！");
				echo json_encode($data);
		  	}
		}
	}
	else if(isset($_GET['action'])&&$_GET['action']=='pull'){
		if(isset($_SESSION['mid'])){
			require "../../common/class/db.php";
			$db=new DB;
		  	$ids=$_POST['ids'];
		  	$rs=$db->delete('pull',"pull_id in ($ids)");
		  	if($rs){
		  		$data=array("error"=>0,"msg"=>"删除成功！");
				echo json_encode($data);
		  	}else{
		  		$data=array("error"=>1,"msg"=>"删除失败！");
				echo json_encode($data);
		  	}
		}
	}
	else if(isset($_GET['action'])&&$_GET['action']=='a'){
		if(isset($_SESSION['mid'])){
			require "../../common/class/db.php";
			$db=new DB;
		  	$ids=$_POST['ids'];
		  	$rs=$db->delete('q_manage',"id in ($ids)");
		  	if($rs){
		  		$data=array("error"=>0,"msg"=>"删除成功！");
				echo json_encode($data);
		  	}else{
		  		$data=array("error"=>1,"msg"=>"删除失败！");
				echo json_encode($data);
		  	}
		}
	}
?>