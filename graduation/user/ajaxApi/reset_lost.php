<?php
	session_start();
	require "../../common/class/db.php";
	require "../../common/class/ajaxguolv.php";
	$db=new DB;
	if(isset($_SESSION['uid']) && $_SESSION['uid']){
		$uid=$_SESSION['uid'];
      	$dataArray=$_POST;
      	if($dataArray['type']==0){
      		$table='found';
      		$table2='lost';
      	}else{
      		$table='lost';
      		$table2='found';
      	}
      	$type=$dataArray['type'];
      	unset($dataArray['type']);
      	$question=$dataArray['question'];
      	$answer=$dataArray['answer'];
      	$answer_type=$dataArray['answer_type'];
      	unset($dataArray['question']);
      	unset($dataArray['answer']);
      	unset($dataArray['answer_type']);
      	$dataArray['u_id']=$uid;
      	if(isset($_SESSION['imgpath']) && $_SESSION['imgpath']){
        	unset($_SESSION['imgpath']);
	    }
      	date_default_timezone_set('PRC');
      	$dataArray['p_date']=date('Y-m-d');
		$l_id=$_GET['l_id'];
		$l_id2=$l_id;
		$l_type=$_GET['type'];
		if($l_type!=$type){
			$sql="INSERT into $table(l_name,l_class,l_feature,l_desc,l_img,l_place,l_date,u_id,u_name,u_phone,u_email,u_address,ct_state,vd_state,p_date) select l_name,l_class,l_feature,l_desc,l_img,l_place,l_date,u_id,u_name,u_phone,u_email,u_address,ct_state,vd_state,p_date from $table2  where l_id=$l_id";
			$rs=$db->query($sql);
			if($rs){
				$l_id2=$db->insert_id();
				$rs=$db->delete($table2,"l_id=$l_id and u_id=$uid");
			}

		}else{
			$rs=$db->update($table,$dataArray,"l_id=$l_id and u_id=$uid");
		}
		
		if($rs){
			$v_dataArray=array();
			$rs2=$db->delete('validation',"l_id=$l_id and l_type=$l_type");
			if($rs2){
				$l_id=$l_id2;
				if($dataArray['ct_state']==1&&$question){
					for($i=0,$len=count($question);$i<$len;$i++){
			      		$v_dataArray[$i]=array('question'=>$question[$i],'answer'=>$answer[$i],'l_id'=>$l_id,'l_type'=>$type,'answer_type'=>$answer_type[$i]);
			      		$rs3=$db->insert('validation',$v_dataArray[$i]);
			      		if(!$rs3){
			      			$data=array("error"=>1,"msg"=>"对不起！修改失败！","l_id"=>'');
							echo json_encode($data);
							exit;
			      		}
			      	}
				}
		      	
				$data=array("error"=>0,"msg"=>"修改成功！","l_id"=>$l_id);
				echo json_encode($data);
			}
			
			
		}else{
			/*echo "<script type='text/javascript'> alert('对不起！注册失败！');history.back(); </script>";*/
			$data=array("error"=>1,"msg"=>"对不起！修改失败！","l_id"=>'');
			echo json_encode($data);
		}
    }



?>
