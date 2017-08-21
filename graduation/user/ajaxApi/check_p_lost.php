<?php
	session_start();
	require "../../common/class/db.php";
	require "../../common/class/ajaxguolv.php";
	$db=new DB;

	if(isset($_SESSION['uid']) && $_SESSION['uid']){
		$uid=$_SESSION['uid'];
      	$dataArray=$_POST;
      	// print_R($_POST);
      	if($dataArray['type']==0){
      		$table='found';
      		$type=0;
      		$type2=1;
      		$table2='lost';
      	}else{
      		$table='lost';
      		$type=1;
      		$type2=0;
      		$table2='found';
      	}
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
		$rs=$db->insert($table,$dataArray);
		if($rs){
			$l_id=$db->insert_id();
			$v_dataArray=array();
			if($dataArray['ct_state']==1&&$question){
				for($i=0,$len=count($question);$i<$len;$i++){
		      		$v_dataArray[$i]=array('question'=>$question[$i],'answer'=>$answer[$i],'l_id'=>$l_id,'l_type'=>$type,'answer_type'=>$answer_type[$i]);
		      		$rs2=$db->insert('validation',$v_dataArray[$i]);
		      		if(!$rs2){
		      			$data=array("error"=>1,"msg"=>"对不起！发布失败！","l_id"=>'');
						echo json_encode($data);
						exit;
		      		}
		      	}
			}

	      	require "../../common/class/checkSimilar.php";
	      	$lcs = new LCS();
	      	$sql="select l_name,l_feature,l_place,l_date from $table where l_id=$l_id";
	      	$l_class=$dataArray['l_class'];
	      	//$l_date=$dataArray['l_date'];
	      	$rs3=$db->get_one($sql);
			$l_date=$rs3['l_date'];
			if($table=='lost'){
	      		$date_condition="l_date>='$l_date'";
	      	}else{
	      		$date_condition="l_date<='$l_date'";
	      	}
	      	$sql2="select l_id,l_name,l_feature,l_place,l_date from $table2 where (l_class=$l_class or l_class=7) and $date_condition";
			$rs4=$db->get_all($sql2);
			//$pull=array();
			$result=array();
			$result2=array();
			$pullcount=0;
			foreach ($rs4 as $key => $value) {
				// echo $rs['concat'].'  '.$value['concat'].'  ';
				$s_name=$lcs->getSimilar($rs3['l_name'],$value['l_name']);
				if($s_name>=0.3){
					$s_feature=$lcs->getSimilar($rs3['l_name'].$rs3['l_feature'],$value['l_name'].$value['l_feature']);
					$s_place=$lcs->getSimilar($rs3['l_place'],$value['l_place']);
					$s_date=$lcs->getSimilar($rs3['l_date'],$value['l_date']);
					$similar=60*$s_feature+20*$s_place+20*$s_date;

					if($similar>=60){
						$pullcount+=1;
						$result['s_id']=$value['l_id'];
						$result['l_type']=$type;
						$result['r_id']=$l_id;
						$result['state']=0;
						$result['similar']=$similar;
						//array_push($pull,$result);WW
						$db->insert('pull',$result);
						$result2['r_id']=$value['l_id'];
						$result2['l_type']=$type2;
						$result2['s_id']=$l_id;
						$result2['state']=0;
						$result2['similar']=$similar;
						//array_push($pull,$result);WW
						$db->insert('pull',$result2);
					}
				}
				
				//echo $lcs->getSimilar($rs['concat'],$value['concat'])."<br>";
			}

			$data=array("error"=>0,"msg"=>"发布成功！","l_id"=>$l_id,"count"=>$pullcount);
			echo json_encode($data);
			
		}else{
			/*echo "<script type='text/javascript'> alert('对不起！注册失败！');history.back(); </script>";*/
			$data=array("error"=>1,"msg"=>"对不起！发布失败！","l_id"=>'');
			echo json_encode($data);
		}
    }
	

?>
