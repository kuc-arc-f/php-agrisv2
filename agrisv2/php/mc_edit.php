<?php
//------------------------------------
// @calling
// @purpose : ブックマーク編集
// @date
// @argment
// @return
//------------------------------------

include_once("../libs/AppCom.php");

	$title_message="Edit";

	// セッション開始
	session_start();
	
	//MySmartyインスタンス生成
	$smarty = new MySmarty();

	if(isset($_GET["id"])){
		$db     =new ComMysql();

		$dat = array();
//		$param["@001"] = $_GET["id"];
		$sql ="select id, mc_name  , moi_num, kai_num_1";
		$sql = $sql . " , vnum_1 , vnum_2, vnum_3, vnum_4, ck_num";
		$sql = $sql . " from m_mcs";
		$sql = $sql . " where id=" . $_GET["id"];
		$result = $db->GetRecord( $sql );
		$i_ct=0;
		while ($row = mysql_fetch_array ($result)) {
			$dat[$i_ct] = $row;
			$i_ct += 1;
		}
	
 		$smarty->assign("title_message", $title_message );
 		$smarty->assign("h_mc_id"     , $_GET["id"] );
 		$smarty->assign("form_type"    , BM_FORM_TYP_EDIT);
		$smarty->assign("dat"          , $dat);
// var_dump($dat);

	//テンプレートの表示
		$smarty->disp_Layout("mc_add.tpl");
	}else{
	 print( $clsConst->MSG_ERROR_001 );
	}
?>