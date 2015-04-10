<?php
//------------------------------------
// @calling
// @purpose : New, Update
// @date
// @argment
// @return
//------------------------------------

//Smartyクラスの呼び出し
include_once("../libs/AppCom.php");

	$title_message="New";
	
	// セッション開始
	session_start();
	
	//MySmartyインスタンス生成
	$smarty = new MySmarty();
	
	$s_image ="";	
	if(isset($_POST["txt_mc_name"])){
//var_dump( mb_detect_encoding($s_title) );
// var_dump( $s_title);
//exit;
		
		$db     =new ComMysql();
		$sql="";
		//$sql= $sql . "INSERT INTO m_mcs (mc_name) values ('mc1');";
		$sql= $sql . "INSERT INTO m_mcs (";
		$sql= $sql . "mc_name";
		$sql= $sql . ", moi_num";
		$sql= $sql . ", kai_num_1";
		$sql= $sql . ", vnum_1";
		$sql= $sql . ", vnum_2";
		$sql= $sql . ", vnum_3";
		$sql= $sql . ", vnum_4";
		$sql= $sql . ", ck_num";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . " '" . $_POST["txt_mc_name"] . "'";
		$sql= $sql . ",0"  . $_POST["txt_moi_num"];
		$sql= $sql . ",0"  . $_POST["txt_kai_num_1"];
		$sql= $sql . ",0"  . $_POST["txt_vnum_1"];
		$sql= $sql . ",0"  . $_POST["txt_vnum_2"];
		$sql= $sql . ",0"  . $_POST["txt_vnum_3"];
		$sql= $sql . ",0"  . $_POST["txt_vnum_4"];
		$sql= $sql . ",0"  . $_POST["txt_ck_num"];
		
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		
//var_dump($sql);
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			print "Data Insert Error!";
			exit;
		}
		
		//flash_notice
		$smarty->assign("title_message", $title_message );
//		$smarty->assign("flash_notice", "登録が完了しました。" );
		
		//テンプレートの表示
		header( "Location: ./mc_index.php");
	}else{
	 print("Argment Error");
	}
?>