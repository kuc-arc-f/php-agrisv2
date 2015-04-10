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

	$title_message="New";
	// セッション開始
	session_start();
	$smarty = new MySmarty();
	
	$s_image ="";	
	if(isset($_GET["id"])){
//var_dump( $_GET["id"] );
//exit;
		
		$db     =new ComMysql();
		$sql="";
		//$sql= $sql . "INSERT INTO m_mcs (mc_name) values ('mc1');";
		$sql= $sql . "delete from m_mcs where id=" . $_GET["id"] . ";";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			print "Data Insert Error!";
			exit;
		}
		
		//flash_notice
		$smarty->assign("title_message", $title_message );
		
		//テンプレートの表示
		header( "Location: ./mc_index.php");
	}else{
	 print("Argment Error");
	}
?>