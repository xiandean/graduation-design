<?php
require "../common/class/smarty.php";
require "isLogin.php";
require_once "../common/class/db.php";
$db=new DB;
$sql='select * from lost order by p_date desc,l_id desc limit 4';
$lost= $db->get_all($sql);
$sql2='select * from found order by p_date desc,l_id desc limit 4';
$found= $db->get_all($sql2);
$sql3='select * from announce order by p_date desc,a_id desc limit 3';
$announce= $db->get_all($sql3);
$sql4='select * from thanks where checked=1 order by p_date desc,t_id desc limit 7';
$thanks= $db->get_all($sql4);


$smarty=new SmartyProject();
$smarty->assign('uid',$uid);
$smarty->assign('username',$username);
$smarty->assign('headImg',$headImg);
$smarty->assign('lost',$lost);
$smarty->assign('found',$found);
$smarty->assign('announce',$announce);
$smarty->assign('thanks',$thanks);
$smarty->assign('title','index');
$smarty->display('user/index.tpl');
?>