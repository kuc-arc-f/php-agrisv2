<?php

function get_sqlString($vNum , $getDat){
	$ret="";
	$sql = "select id , snum, created,DATE_FORMAT(created,'%H%i') as ct_str ,DATE_FORMAT(now(),'%m%d')  from t_sensors";
	$sql = $sql ."  where mc_id=" . $getDat["id"] ;
	$sql = $sql ."  and vnum=" . $vNum . " and DATE_FORMAT(created,'%m%d')='" . $getDat["mmdd"] . "'";
//	$sql = $sql . " and substr(DATE_FORMAT(created,'%H%i') ,4 ,4) ='0'";
	$sql = $sql . "  order  by created ASC;";
	$ret = $sql;
	return $ret;
}
//
function get_jsArray( $dat ){
	$iCt=0;
	$sDat="";
    foreach ($dat as &$value) {
     if( $iCt==0){
     	$sDat =$sDat . "["  . $value["ct_str"] . ",". $value["snum"]  ."]";
     }else{
     	$sDat =$sDat . ", ["  . $value["ct_str"] . ",". $value["snum"]  ."]";
     }
     $iCt++;
    }
    return $sDat;
}
//
function get_sensorArray( $getDat ){
	$db     =new ComMysql();
	$dat = array();
	$i_ct =0;
	$sql = "select id ";
	//DATE_FORMAT(created,'%m-%d %H:%i:%s')
	$sql = $sql ." , mc_id, vnum, snum, DATE_FORMAT(created,'%m-%d %H:%i:%s') as str_cre";
	$sql = $sql ." , modified";
	$sql = $sql . " from t_sensors";
	$sql = $sql . " where mc_id=" . $getDat["id"] ;
//	$sql = $sql . " where mc_id=" . $getDat["id"]  . " and sv_id=" . $getDat["sv_id"];
	$sql = $sql . "  order  by created DESC, vnum ASC limit 30;";
	$result = $db->GetRecord( $sql );
	while ($row = mysql_fetch_array ($result)) {
		$dat[$i_ct] = $row;
		$i_ct += 1;
	}	
	return $dat;
}
//
function get_valveArray( $getDat ){
	$db     =new ComMysql();
	$dat = array();
	$i_ct =0;
	
	$sql ="select id";
	$sql = $sql ." , mc_id, vnum, k_flg, DATE_FORMAT(created,'%m-%d %H:%i:%s') as str_cre";
	$sql = $sql ." , modified";
	$sql = $sql . " from t_vitems";
	$sql = $sql . " where mc_id=" . $getDat["id"] ;
	$sql = $sql . "  order  by created DESC , vnum ASC limit 30;";
	$result = $db->GetRecord( $sql );
	while ($row = mysql_fetch_array ($result)) {
		$dat[$i_ct] = $row;
		$i_ct += 1;
	}
	return $dat;
}
	
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
	$sMc_id = $_GET["id"];
	
	$db     =new ComMysql();
	if(isset($_GET["id"])){
	  if(isset($_GET["mmdd"])){
	  	$datMc = com_getMcDat($db, $_GET["id"]  );
	  	if($datMc !=NULL){
			$i_ct =0;
			$dat = array();
			$sql= get_sqlString("1" , $_GET );
			$result = $db->GetRecord( $sql );
			while ($row = mysql_fetch_array ($result)) {
				$dat[$i_ct] = $row;
				$i_ct += 1;
			}
			$i_ct =0;
			$dat2 = array();
			$sql= get_sqlString("2" , $_GET );
			$result = $db->GetRecord( $sql );
			while ($row = mysql_fetch_array ($result)) {
				$dat2[$i_ct] = $row;
				$i_ct += 1;
			}
			$i_ct =0;
			$dat3 = array();
			$sql= get_sqlString("3" , $_GET );
			$result = $db->GetRecord( $sql );
			while ($row = mysql_fetch_array ($result)) {
				$dat3[$i_ct] = $row;
				$i_ct += 1;
			}
			$i_ct =0;
			$dat4 = array();
			$sql= get_sqlString("4" , $_GET );
			$result = $db->GetRecord( $sql );
			while ($row = mysql_fetch_array ($result)) {
				$dat4[$i_ct] = $row;
				$i_ct += 1;
			}
			$datSen   = get_sensorArray( $_GET );
			$datValve = get_valveArray( $_GET );
	//var_dump($datMc[0]["vnum_1"]);
			$sDat ="[0,0]";
			$sDat2="[0,0]";
			$sDat3="[0,0]";
			$sDat4="[0,0]";
			//テンプレートの表示
			if($datMc[0]["vnum_1"]==OK_CODE){
				$sDat  = get_jsArray( $dat );
			}
			if($datMc[0]["vnum_2"]==OK_CODE){
				$sDat2 = get_jsArray( $dat2 );
			}
			if($datMc[0]["vnum_3"]==OK_CODE){
				$sDat3 = get_jsArray( $dat3 );
			}
			if($datMc[0]["vnum_4"]==OK_CODE){
				$sDat4 = get_jsArray( $dat4 );
			}	  	
			include( "../rep1.htm");	  	  
	  	}else{
			echo $clsConst->MSG_ERROR_010 . " ,mc_id=" . $_GET["id"];
	  	}
	  }
	}
?>