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
		$db     =new ComMysql();
		//MySmartyインスタンス生成
		$smarty = new MySmarty();
		
		$max_id=0;
		$min_id=0;
		$i_ct =0;
		$dat = array();
		$sql = "select id, txt_log, created, DATE_FORMAT(created,'%m-%d %H:%i:%s') as cre_date from t_mlogs";
		$sql = $sql . "  order by created DESC,id DESC limit 100;";
// var_dump( $sql );
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
			$dat[$i_ct] = $row;
			$i_ct += 1;
		}

		//pager
		$data_array= array();
		$smarty->assign("result"      , $dat );
		$smarty->assign("title_message" , "Log");

		//テンプレートの表示
		$smarty->disp_Layout("log_index.tpl");
?>