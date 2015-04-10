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
	
	// セッション開始
	session_start();
	$smarty = new MySmarty();
    $db     =new ComMysql();
	$iCt=0;
	if(isset($_GET["logout"])){
		$smarty->assign("title_message" , "Login");
		if(isset($_COOKIE[ SYS_COOK_USER ])){
			$smarty->assign("cook_user_name" , $_COOKIE[ SYS_COOK_USER ]);
		}
		$smarty->display($smarty->template_dir . "/Layout/yt_head_no.tpl");	
		$smarty->display($smarty->template_dir . "/login_index.tpl" );
		$smarty->display($smarty->template_dir . "/Layout/yt_foot.tpl");
		setcookie( SYS_COOK_USER ,  "" , time()+ SYS_COOK_EXPR );
		setcookie( SYS_COOK_PASS ,  "" , time()+ SYS_COOK_EXPR );			
		exit;
	}
	if(isset($_POST["h_check"])){
		$sql = "select count(*) as ct_num from m_user";
		$sql =$sql . " where user_name='" . $_POST["txt_user_name"] . "' and s_pass='" . $_POST["txt_pass"]. "'";
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
			$iCt = $row[0];
		}
//var_dump($iCt);
		if($iCt < 1){
//			echo "ng-login";
				$smarty->assign("cook_user_name" ,  $_POST["txt_user_name"] );
				$smarty->assign("title_message" , "Login");
				$smarty->assign("flash_notice"  , "failure Login, please check User/Password ");
				$smarty->display($smarty->template_dir . "/Layout/yt_head_no.tpl");	
				$smarty->display($smarty->template_dir . "/login_index.tpl" );
				$smarty->display($smarty->template_dir . "/Layout/yt_foot.tpl");

		}else{
			setcookie( SYS_COOK_USER ,  $_POST["txt_user_name"] , time()+ SYS_COOK_EXPR );
			setcookie( SYS_COOK_PASS ,  $_POST["txt_pass"]      , time()+ SYS_COOK_EXPR );			
			header( "Location:  ./mc_index.php");
		}
	}else{
// var_dump("c-user=" . $_COOKIE[ SYS_COOK_USER ] );
		if (isset($_COOKIE[ SYS_COOK_USER ])) {
			$login_user=$_COOKIE[ SYS_COOK_USER ];
			$login_pass=$_COOKIE[ SYS_COOK_PASS ];
			setcookie( SYS_COOK_USER ,  $login_user , time()+ SYS_COOK_EXPR );
			setcookie( SYS_COOK_PASS ,  $login_pass , time()+ SYS_COOK_EXPR );
			header( "Location:  ./mc_index.php");
		}else{
			$sql = "select count(*) as ct_num from m_user;";
			$result = $db->GetRecord( $sql );
			while ($row = mysql_fetch_array ($result)) {
				$iCt = $row[0];
			}
			if($iCt < 1){
				header( "Location: ./signup.php");
			}else{
				$smarty->assign("title_message" , "Login");
				if(isset($_SESSION[ SESS_USER_NAME ])){
					$smarty->assign("cook_user_name" , $_SESSION[ SESS_USER_NAME ] );
				}
				$smarty->display($smarty->template_dir . "/Layout/yt_head_no.tpl");	
				$smarty->display($smarty->template_dir . "/login_index.tpl" );
				$smarty->display($smarty->template_dir . "/Layout/yt_foot.tpl");
			}
		}

	}

?>