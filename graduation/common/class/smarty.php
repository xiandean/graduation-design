<?php 
@header('Content-type: text/html;charset=UTF-8');
require "../common/class/guolv.php";
require "../common/Smarty/Smarty.class.php";	
class SmartyProject extends Smarty{
	function SmartyProject(){
		$this->template_dir="../common/templates";
		$this->compile_dir="../common/templates_c/";
		$this->config_dir="../common/configs/";
		$this->cache_dir="../common/cache";
	}
}
?>