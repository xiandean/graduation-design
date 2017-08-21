<?php

$referer=empty($_SERVER['HTTP_REFERER']) ? array() : array($_SERVER['HTTP_REFERER']);
function customError($errno, $errstr, $errfile, $errline)
{ 
	echo "<b>Error number:</b> [$errno],error on line $errline in $errfile<br />";
	die();
}
set_error_handler("customError",E_ERROR);
$getfilter="'|\b(alert|confirm|prompt)\b|<[^>]*?>|^\\+\/v(8|9)|\\b(and|or)\\b.+?(>|<|=|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
$postfilter="^\\+\/v(8|9)|\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|<\\s*img\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
$cookiefilter="\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
function StopAttack($StrFiltKey,$StrFiltValue,$ArrFiltReq){
	$StrFiltValue=arr_foreach($StrFiltValue);
	if (preg_match("/".$ArrFiltReq."/is",$StrFiltValue)==1){ 
			//slog("<br><br>操作IP: ".$_SERVER["REMOTE_ADDR"]."<br>操作时间: ".strftime("%Y-%m-%d %H:%M:%S")."<br>操作页面:".$_SERVER["PHP_SELF"]."<br>提交方式: ".$_SERVER["REQUEST_METHOD"]."<br>提交参数: ".$StrFiltKey."<br>提交数据: ".$StrFiltValue);
			$data=array("error"=>10,"msg"=>"非法数据1");
			echo json_encode($data);
			exit();
	}
	if (preg_match("/".$ArrFiltReq."/is",$StrFiltKey)==1){   
			//slog("<br><br>操作IP: ".$_SERVER["REMOTE_ADDR"]."<br>操作时间: ".strftime("%Y-%m-%d %H:%M:%S")."<br>操作页面:".$_SERVER["PHP_SELF"]."<br>提交方式: ".$_SERVER["REQUEST_METHOD"]."<br>提交参数: ".$StrFiltKey."<br>提交数据: ".$StrFiltValue);
			$data=array("error"=>10,"msg"=>"非法数据2");
			echo json_encode($data);
			exit();
	}  
}  
foreach($_COOKIE as $key=>$value){
	StopAttack($key,$value,$cookiefilter);
}
foreach($_GET as $key=>$value){
	StopAttack($key,$value,$getfilter);
}
foreach($_POST as $key=>$value){
	StopAttack($key,$value,$postfilter);
}
foreach($referer as $key=>$value){ 
	StopAttack($key,$value,$getfilter);
}

function slog($logs)
{
	//$toppath=$_SERVER["DOCUMENT_ROOT"]."/log.htm";
	//$Ts=fopen($toppath,"a+");
	//fputs($Ts,$logs."\r\n");
	//fclose($Ts);
}
function arr_foreach($arr) {
	static $str;
	if (!is_array($arr)) {
		return $arr;
	}
	foreach ($arr as $key => $val ) {
		if (is_array($val)) {
			arr_foreach($val);
		}else{
		  $str[] = $val;
		}
	}
	return implode($str);
}
?>