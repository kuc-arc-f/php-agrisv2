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
	$smarty = new MySmarty();
	session_start();
	
	if(isset($_POST["txt_user_name"])){
		$db     =new ComMysql();
		if(com_addUser($db, $_POST )==FALSE){
			exit;
		}
		//code-add
		$sKey = com_getRestKey();
		if(com_addCode($db, $sKey )==FALSE){
			exit;
		}		
		//mc-add
		if(com_addMc($db )==FALSE){
			exit;
		}
		$_SESSION[ SESS_USER_NAME ]    = $_POST["txt_user_name"];
	    header( "Location: ../");
	}else{
	 print("Argment Error");
	}
?>