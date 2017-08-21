<?php
	session_start();
	require "../../common/class/db.php";
	require "../../common/class/ajaxguolv.php";
	$db=new DB;
	if(empty($_SESSION['uid'])){
		$data=array("error"=>2,"msg"=>"请先登陆！");
	}else if(isset($_GET['action'])&&$_GET['action']=='post'){
		$s_id=$_SESSION['uid'];
		$xs_type=0;
		date_default_timezone_set('PRC');
      	$xs_date=date('Y-m-d');
      	$l_id=$_GET['l_id'];
      	$l_type=$_GET['l_type'];
      	$xs_context=$_GET['xs_context'];
      	$table=$l_type==0?'found':'lost';
      	$sql="select u_id from $table where l_id=$l_id";
      	$rs=$db->get_one($sql);
      	if($rs){
      		$r_id=$rs['u_id'];
      		if($r_id==$s_id){
      			$data=array("error"=>999,"msg"=>"您是发布者，操作无效！");
				echo json_encode($data);
				exit;
      		}
      		$dataArray=array("l_id"=>$l_id,"l_type"=>$l_type,"s_id"=>$s_id,"r_id"=>$r_id,"xs_context"=>$xs_context,"xs_date"=>$xs_date,"xs_type"=>$xs_type);
      		$rs2=$db->insert('xiansuo',$dataArray);
      		if($rs2)
      			$data=array("error"=>0,"msg"=>"提交成功！");
      	}	
	}else if(isset($_GET['action'])&&$_GET['action']=='get'){
		$r_id=$_SESSION['uid'];
		$sql="select * from xiansuo where r_id=$r_id and xs_state=0 order by xs_date desc";
		$rs=$db->get_all($sql);
		if($rs){
			foreach ($rs as $key => $value) {
  				$l_id=$value['l_id'];
  				$s_id=$value['s_id'];
  				$table=$value['l_type']==0?'found':'lost';
  				$sql2="select name,phone from user where id=$s_id";
  				$rs2=$db->get_one($sql2);
  				$rs[$key]['u_name']=$rs2['name'];
  				$rs[$key]['phone']=$rs2['phone'];
  				$sql3="select l_name from $table where l_id=$l_id";
  				$rs3=$db->get_one($sql3);
  				$rs[$key]['l_name']=$rs3['l_name'];
  			}
			$data=array("error"=>0,"msg"=>"获取成功！","xs"=>$rs);
		}
		else{
			$data=array("error"=>1,"msg"=>"暂无线索！","xs"=>$rs);
		}
	}else if(isset($_GET['action'])&&$_GET['action']=='ignore'){
		$r_id=$_SESSION['uid'];
		$xs_id=$_GET['xs_id'];
		$rs=$db->delete('xiansuo',"xs_id=$xs_id");
		if($rs){
			$data=array("error"=>0,"msg"=>"已忽略！");
		}else{
			$data=array("error"=>1,"msg"=>"未忽略！");
		}
	}else if(isset($_GET['action'])&&$_GET['action']=='save'){
		$r_id=$_SESSION['uid'];
		$xs_id=$_GET['xs_id'];
		$rs=$db->update('xiansuo',array("xs_state"=>1),"xs_id=$xs_id");
		if($rs){
			$data=array("error"=>0,"msg"=>"已保存！");
		}else{
			$data=array("error"=>1,"msg"=>"未保存！");
		}
	}
	echo json_encode($data);
?>
