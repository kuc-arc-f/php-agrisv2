<?php
//------------------------------------
// @calling
// @purpose :
// @date
// @argment
// @return
//------------------------------------

include_once("../libs/AppCom.php");

	$title_message="Setting";
	// セッション開始
	session_start();
	$smarty = new MySmarty();

		$db     =new ComMysql();
		$dat = array();
		$sql ="select code from m_code where Kbn=6 limit 1;";
		$result = $db->GetRecord( $sql );
		$i_ct=0;
		$sCode="";
		while ($row = mysql_fetch_array ($result)) {
			$sCode = $row["code"];
			$i_ct += 1;
		}
 		$smarty->assign("title_message", $title_message );
 		//$smarty->assign("h_mc_id"     , $_GET["id"] );
 		//$smarty->assign("form_type"    , BM_FORM_TYP_EDIT);
		$smarty->assign("dat"          , $dat);
 		$smarty->assign("sCode", $sCode);
// var_dump($dat);

	//テンプレートの表示
		$smarty->disp_Layout("setting.tpl");
?>