<?php
//------------------------------------
// @calling
// @purpose : 
// @date
// @argment
// @return
//------------------------------------

//Smartyクラスの呼び出し
include_once("../libs/AppCom.php");
	$clsConst = new AppConst();
	
	session_start();
	$smarty = new MySmarty();
	$smarty->assign("title_message" , "Sign Up");

	$smarty->display($smarty->template_dir . "/Layout/yt_head_no.tpl");	
	$smarty->display($smarty->template_dir . "/signup.tpl" );
	$smarty->display($smarty->template_dir . "/Layout/yt_foot.tpl");
?>