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

	$title_message="新規登録";
	
	// セッション開始
	session_start();
	
	//MySmartyインスタンス生成
	$smarty = new MySmarty();
	
	$s_image ="";	
	if(isset($_POST["h_mc_id"])){
		
		$db     =new ComMysql();
		$sql ="";
		$sql = $sql . "update m_mcs ";
		$sql = $sql . " set mc_name='" . $_POST["txt_mc_name"] . "'";
		$sql = $sql . " ,moi_num=" . $_POST["txt_moi_num"];
		$sql = $sql . " ,kai_num_1=" . $_POST["txt_kai_num_1"];
		$sql = $sql . " ,vnum_1="    . $_POST["txt_vnum_1"];
		$sql = $sql . " ,vnum_2="    . $_POST["txt_vnum_2"];
		$sql = $sql . " ,vnum_3="    . $_POST["txt_vnum_3"];
		$sql = $sql . " ,vnum_4="    . $_POST["txt_vnum_4"];
		$sql = $sql . " ,ck_num="    . $_POST["txt_ck_num"];
		
		$sql = $sql . " ,modified=now()";
		$sql = $sql . " where id=" . $_POST["h_mc_id"] ;
		
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			print "Data Error!";
			exit;
		}
		
		//flash_notice
		$smarty->assign("title_message", $title_message );
		$smarty->assign("flash_notice", "Complete Update." );
		
		header( "Location: ./mc_index.php");
	}else{
	 print("Argment Error");
	}
?>