<?php
//------------------------------------
// @calling
// @purpose : Zero Str, max=10 char
// @date
// @argment
// @return
//------------------------------------
function CM001_getZeroStr( $src, $num ){
	if($num > 10){
		return "";
	}
	
	
	$buff="0000000000";

	$buff = $buff . $src;
	$i_len = strlen($buff);
	$ret = substr($buff, $i_len - $num, $num);
	
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_load_csv( $fnm ){
	$csv  = array();
	$file = $fnm;
	$fp   = fopen($file, "r");
	 
	while (($data = fgetcsv($fp, 0, ",")) !== FALSE) {
	  $csv[] = $data;
	}
	fclose($fp);
	 
	return $csv;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_getRestKey( ){
	$sRet="";
	
	$sRan ="r";
	$nRan =mt_rand(100, 999);
	$sRet = $sRan . $nRan;

	return $sRet;
}


//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_addMc($db ){
	$ret=FALSE;
		$sql= "INSERT INTO m_mcs (";
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
		$sql= $sql . " 'micon-1'";
		$sql= $sql . ",500";
		$sql= $sql . ",20";
		$sql= $sql . ",1";
		$sql= $sql . ",0";
		$sql= $sql . ",0";
		$sql= $sql . ",0";
		$sql= $sql . ",1800";
		
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		
//var_dump($sql);
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			print "Data Insert Error!";
			return $ret;
		}
	$ret = true;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_addCode($db, $sKey ){
	$ret =FALSE;
	
	$sql=       "INSERT INTO m_code (";
	$sql= $sql . " kbn";
	$sql= $sql . ",code";
	$sql= $sql . ", created";
	$sql= $sql . ") values (";
	$sql= $sql . " 6";
	$sql= $sql . ",'" . $sKey  . "'";
	$sql= $sql . ",now()";
	$sql= $sql . ");";
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		print "Data Insert Error!";
		return $ret;
	}
	$ret =TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_addUser($db, $dPost ){
	$ret =FALSE;
	
	$sql=       "INSERT INTO m_user (";
	$sql= $sql . " user_name";
	$sql= $sql . ",s_pass";
	$sql= $sql . ", created";
	$sql= $sql . ") values (";
	$sql= $sql . " '" . $dPost["txt_user_name"] . "'";
	$sql= $sql . ",'" . $dPost["txt_pass"] . "'";
	$sql= $sql . ",now()";
	$sql= $sql . ");";
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		print "Data Insert Error!";
		return $ret;
	}
	$ret =TRUE;
	return $ret;
}
//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_convert($db, $sid){
	$ret=FALSE;
	
	$sql = "delete from m_sv_mc where sv_id=" . $sid;
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}
	$sql = "insert into m_sv_mc";
	$sql = $sql . "(sv_id, mc_id, mc_name, moi_num,kai_num_1,kai_num_2,kai_num_3,kai_num_4";
	$sql = $sql . ",vnum_1,vnum_2,vnum_3,vnum_4,ck_num)";
	$sql = $sql . "select sv_id, mc_id ,mc_name ,moi_num,kai_num_1, kai_num_2,kai_num_3,kai_num_4";
	$sql = $sql . ",vnum_1,vnum_2,vnum_3,vnum_4,ck_num from wk_mcs";
	$sql = $sql . " where sv_id=" . $sid;
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}
	$sql = "delete from t_sv_sensor where sv_id=" . $sid;
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}
	$sql ="insert into t_sv_sensor";
	$sql =$sql . "(sv_id ,mc_id, vnum, snum, created)";
	$sql =$sql . " select sv_id, mc_id, vnum, snum ,created from wk_sensors ";
	$sql =$sql . " where sv_id=". $sid;
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}
	$sql = "delete from t_sv_valve where sv_id=" . $sid;
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}
	$sql ="insert into t_sv_valve";
	$sql =$sql. "(sv_id ,mc_id, vnum, k_flg, k_kbn, created)";
	$sql =$sql. "select sv_id, mc_id, vnum, k_flg , k_kbn, created from wk_vitems";
	$sql =$sql. " where sv_id=". $sid;
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}
		
	$ret = TRUE;
	return $ret;
}


//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_convertMs2($db, $sid){
	$ret=FALSE;
	
	$sql = "delete from m_sv_mc where sv_id=" . $sid;
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}
	$sql = "insert into m_sv_mc";
	$sql = $sql . "(sv_id, mc_id, mc_name, moi_num,kai_num_1,kai_num_2,kai_num_3,kai_num_4";
	$sql = $sql . ",vnum_1,vnum_2,vnum_3,vnum_4,ck_num)";
	$sql = $sql . "select sv_id, mc_id ,mc_name ,moi_num,kai_num_1, kai_num_2,kai_num_3,kai_num_4";
	$sql = $sql . ",vnum_1,vnum_2,vnum_3,vnum_4,ck_num from wk_mcs";
	$sql = $sql . " where sv_id=" . $sid;
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}

	$ret = TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_convertMs($db, $sid){
	$ret=FALSE;
	
	$iCt=0;
	$dat=array();
	$sql ="select sv_id, mc_id, mc_name, moi_num,kai_num_1,kai_num_2,kai_num_3,kai_num_4";
	$sql =$sql. " ,vnum_1,vnum_2,vnum_3,vnum_4,ck_num,created";
	$sql =$sql. " from wk_mcs where sv_id=" . $sid;
	$result = $db->GetRecord( $sql );
	while ($row = mysql_fetch_array ($result)) {
		$dat[ $iCt ] = $row;
		$iCt=$iCt+1;
	}
	for ($i = 0; $i< count($dat); $i++) {
		$iCt_ms=0;
		$sql="select count(*) as ct_num from m_sv_mc where sv_id =" . $sid . " and mc_id=" . $dat[$i]["mc_id"];
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
		  $iCt_ms = $row["ct_num"];
// var_dump($iCt_ms);
		}
		if($iCt_ms < 1){
			$sql = "insert into m_sv_mc";
			$sql = $sql . "(sv_id, mc_id, mc_name, moi_num,kai_num_1,kai_num_2,kai_num_3,kai_num_4";
			$sql = $sql . ",vnum_1,vnum_2,vnum_3,vnum_4,ck_num, created)values";
			$sql = $sql . "(" . $dat[$i]["sv_id"];
			$sql = $sql . "," . $dat[$i]["mc_id"];
			$sql = $sql . ",'". $dat[$i]["mc_name"] . "'";

			$sql = $sql . "," . $dat[$i]["moi_num"];
			$sql = $sql . "," . $dat[$i]["kai_num_1"];
			$sql = $sql . "," . $dat[$i]["kai_num_2"];
			$sql = $sql . "," . $dat[$i]["kai_num_3"];
			$sql = $sql . "," . $dat[$i]["kai_num_4"];
			$sql = $sql . "," . $dat[$i]["vnum_1"];
			$sql = $sql . "," . $dat[$i]["vnum_2"];
			$sql = $sql . "," . $dat[$i]["vnum_3"];
			$sql = $sql . "," . $dat[$i]["vnum_4"];
			$sql = $sql . "," . $dat[$i]["ck_num"];
			$sql = $sql . ",'" . $dat[$i]["created"] . "'";
			$sql = $sql . ");";
			$result = $db->Exec_NonQuery( $sql );
			if ($result == false) {
				return $ret;
			}		
		}else{
			$sql = "update m_sv_mc";
			$sql = $sql . " set mc_name='" . $dat[$i]["mc_name"] . "'";
			$sql = $sql . " ,moi_num=" . $dat[$i]["moi_num"];
			$sql = $sql . " ,kai_num_1=" . $dat[$i]["kai_num_1"];
			$sql = $sql . " ,kai_num_2=" . $dat[$i]["kai_num_2"];
			$sql = $sql . " ,kai_num_3=" . $dat[$i]["kai_num_3"];
			$sql = $sql . " ,kai_num_4=" . $dat[$i]["kai_num_4"];
			$sql = $sql . " ,vnum_1=" . $dat[$i]["vnum_1"];
			$sql = $sql . " ,vnum_2=" . $dat[$i]["vnum_2"];
			$sql = $sql . " ,vnum_3=" . $dat[$i]["vnum_3"];
			$sql = $sql . " ,vnum_4=" . $dat[$i]["vnum_4"];
			$sql = $sql . " ,ck_num=" . $dat[$i]["ck_num"];
			$sql = $sql . " where sv_id=" . $dat[$i]["sv_id"];
			$sql = $sql . " and  mc_id=" . $dat[$i]["mc_id"];
			$result = $db->Exec_NonQuery( $sql );
			if ($result == false) {
				return $ret;
			}		
		}
	}
	$ret = TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_convert2($db, $sid){
	$ret=FALSE;
	
	$iCt=0;
	$dat=array();
	$sql="select sv_id, mc_id, vnum, snum ,created, tr_id from wk_sensors where sv_id=" . $sid;
	$result = $db->GetRecord( $sql );
	while ($row = mysql_fetch_array ($result)) {
		$dat[ $iCt ] = $row;
		$iCt=$iCt+1;
	}
	for ($i = 0; $i< count($dat); $i++) {
		$iCt_sen=0;
		$sql="select count(*) as ct_num from t_sv_sensor where sv_id =" . $sid . " and tr_id=" . $dat[$i]["tr_id"];
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
		  $iCt_sen = $row["ct_num"];
// var_dump($iCt_sen);
		}
		if($iCt_sen < 1){
			$sql ="insert into t_sv_sensor";
			$sql =$sql . "(sv_id ,mc_id, vnum, snum , tr_id, created)values";
			$sql = $sql . "(". $dat[$i]["sv_id"];
			$sql = $sql . ",". $dat[$i]["mc_id"];
			$sql = $sql . ",". $dat[$i]["vnum"];
			$sql = $sql . ",". $dat[$i]["snum"];
			$sql = $sql . ",". $dat[$i]["tr_id"];
			$sql = $sql . ",'". $dat[$i]["created"] . "'";
			$sql = $sql . ");";
			$result = $db->Exec_NonQuery( $sql );
			if ($result == false) {
				return $ret;
			}
		}
	}
	$ret = TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_convertValve($db, $sid){
	$ret=FALSE;

	$iCt=0;
	$dat=array();
	$sql="select sv_id, mc_id, vnum, k_flg, k_kbn ,created, tr_id from wk_vitems where sv_id=" . $sid;
	$result = $db->GetRecord( $sql );
	while ($row = mysql_fetch_array ($result)) {
		$dat[ $iCt ] = $row;
		$iCt=$iCt+1;
	}
	for ($i = 0; $i< count($dat); $i++) {
		$iCt_sen=0;
		$sql="select count(*) as ct_num from t_sv_valve where sv_id =" . $sid . " and tr_id=" . $dat[$i]["tr_id"];
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
		  $iCt_sen = $row["ct_num"];
// var_dump($iCt_sen);
		}
		if($iCt_sen < 1){
			$sql ="insert into t_sv_valve";
			$sql =$sql . "(sv_id ,mc_id, vnum, k_flg, k_kbn , tr_id, created)values";
			$sql = $sql . "(". $dat[$i]["sv_id"];
			$sql = $sql . ",". $dat[$i]["mc_id"];
			$sql = $sql . ",". $dat[$i]["vnum"];
			$sql = $sql . ",". $dat[$i]["k_flg"];
			$sql = $sql . ",". $dat[$i]["k_kbn"];
			$sql = $sql . ",". $dat[$i]["tr_id"];
			$sql = $sql . ",'". $dat[$i]["created"] . "'";
			$sql = $sql . ");";
			$result = $db->Exec_NonQuery( $sql );
			if ($result == false) {
				return $ret;
			}
		}
	}
	$ret = TRUE;
	return $ret;
}
//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_initWork($db, $sid){
	$ret=FALSE;
	
	$sql = "delete from wk_mcs where sv_id=" . $sid;
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}
	$sql = "delete from wk_sensors where sv_id=" . $sid;
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}
	$sql = "delete from wk_vitems where sv_id=" . $sid;
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}
	
	
	
	$ret = TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
// function Is_userAuth($db, $user, $pass){
function com_isUserAuth($db, $user, $pass){
	$ret=false;
	$iCt =0;
	$sql = "select count(*) as ct_num from m_user";
	$sql =$sql . " where user_name='" . $user . "' and s_pass='" . $pass . "'";
	$result = $db->GetRecord( $sql );
	while ($row = mysql_fetch_array ($result)) {
		$iCt = $row[0];
	}
	if($iCt > 0){
		$ret=TRUE;
	}
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_getSvDat($db, $sid){
	$ret=NULL;
	
	$dat = array();
	$sql = "select id from m_sv where id=" . $sid;
	$sql = $sql ." limit 1;";

	$result = $db->GetRecord( $sql );
	while ($row = mysql_fetch_array ($result)) {
		$dat[0] = $row;
	}
	$ret = $dat;
		
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_isValidKey($db, $sKey ){
	$ret=false;
	
	$iCt=0;
	$sql = "select count(*) as ct_num from  m_code  where kbn=6 and code='"  . $sKey . "'";

	$result = $db->GetRecord( $sql );
	while ($row = mysql_fetch_array ($result)) {
		$iCt = $row[0];
	}
	if($iCt < 1){
		return $ret;
	}
	$ret=TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_getMcDat($db, $sid){
	$ret=NULL;
	
	$dat = array();
	$sql = "select id, mc_name ,moi_num ";
	$sql = $sql ." , kai_num_1, vnum_1";
	$sql = $sql ." , kai_num_2, vnum_2";
	$sql = $sql ." , kai_num_3, vnum_3";
	$sql = $sql ." , kai_num_4, vnum_4";
	$sql = $sql ." , ck_num, created";
	$sql = $sql . " from m_mcs where id="  . $sid .  " limit 1;";

	$result = $db->GetRecord( $sql );
	while ($row = mysql_fetch_array ($result)) {
		$dat[0] = $row;
	}
	$ret = $dat;
		
	return $ret;
}


//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return TRUE: nothing.dat
//------------------------------------
function com_Is_addSensor($db, $mc_id, $sSec ){
		$ret=FALSE;
		$dat = array();
		$sql = "select id, mc_id, DATE_FORMAT(created,'%Y-%m-%d %H:%i:%s') as creat_dt";
		$sql = $sql ." from t_sensors where mc_id =" . $mc_id;
		$sql = $sql ." ORDER BY created desc limit 1";
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
			$dat[0] = $row;
		}
		if($dat==NULL){
//			var_dump("NULL: com_Is_addSensor" . "id=" . $mc_id);
		  return TRUE;
		
		}
		$datSec = array();
		$sql="SELECT  TIMESTAMPDIFF(SECOND, '" . $dat[0]["creat_dt"] . "', now()) as sec_num;";
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
			$datSec[0] = $row;
		}
		$iSec= $datSec[0]["sec_num"];
// var_dump("sec_num=" . $datSec[0]["sec_num"]);
		if($iSec > $sSec){
		  return TRUE;
		}
		return $ret;
}


//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_saveSensor($db, $getDat, $datMc ){
	$ret=FALSE;
//	$db     =new ComMysql();
	if($datMc["vnum_1"] == OK_CODE){
		$sql="";
		$sql= $sql . "INSERT INTO t_sensors (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", snum";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",1";
		$sql= $sql . "," . $getDat["snum_1"];
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	if($datMc["vnum_2"] == OK_CODE){
		$sql= "";
		$sql= $sql . "INSERT INTO t_sensors (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", snum";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",2";
		$sql= $sql . "," . $getDat["snum_2"];
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	if($datMc["vnum_3"] == OK_CODE){
		$sql= "";
		$sql= $sql . "INSERT INTO t_sensors (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", snum";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",3";
		$sql= $sql . "," . $getDat["snum_3"];
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	if($datMc["vnum_4"] == OK_CODE){
		$sql= "";
		$sql= $sql . "INSERT INTO t_sensors (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", snum";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",4";
		$sql= $sql . "," . $getDat["snum_4"];
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}	
	
	$ret = TRUE;
	return $ret;
}


//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return TRUE: nothing.dat
//------------------------------------
function com_Is_addValve($db, $mc_id, $sSec ){
		$ret=FALSE;
		$dat = array();
		$sql = "select id, mc_id, DATE_FORMAT(created,'%Y-%m-%d %H:%i:%s') as creat_dt";
		$sql = $sql ." from t_vitems where mc_id =" . $mc_id;
		$sql = $sql ." ORDER BY created desc limit 1";
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
			$dat[0] = $row;
		}
		if($dat==NULL){
		  return TRUE;
		
		}
		$datSec = array();
		$sql="SELECT  TIMESTAMPDIFF(SECOND, '" . $dat[0]["creat_dt"] . "', now()) as sec_num;";
		$result = $db->GetRecord( $sql );
		while ($row = mysql_fetch_array ($result)) {
			$datSec[0] = $row;
		}
		$iSec= $datSec[0]["sec_num"];
//var_dump("sec_num=" . $datSec[0]["sec_num"]);
		if($iSec > $sSec){
		  return TRUE;
		}
		return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_saveValve($db, $getDat, $datMc ){
	$ret=FALSE;
//var_dump($datMc["moi_num"]);
//$getDat["snum_1"]
	$k_flg_1 =Is_validValve($getDat["snum_1"], $datMc["moi_num"] );
	$k_flg_2 =Is_validValve($getDat["snum_2"], $datMc["moi_num"] );
	$k_flg_3 =Is_validValve($getDat["snum_3"], $datMc["moi_num"] );
	$k_flg_4 =Is_validValve($getDat["snum_4"], $datMc["moi_num"] );
var_dump($k_flg_1);
	if($datMc["vnum_1"] == OK_CODE){
		$sql="";
		$sql= $sql . "INSERT INTO t_vitems (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", k_flg";
		$sql= $sql . ", k_kbn";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",1";
		$sql= $sql . "," . $k_flg_1;
		$sql= $sql . ",1";
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	if($datMc["vnum_2"] == OK_CODE){
		$sql="";
		$sql= $sql . "INSERT INTO t_vitems (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", k_flg";
		$sql= $sql . ", k_kbn";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",2";
		$sql= $sql . "," . $k_flg_2;
		$sql= $sql . ",1";
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	if($datMc["vnum_3"] == OK_CODE){
		$sql="";
		$sql= $sql . "INSERT INTO t_vitems (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", k_flg";
		$sql= $sql . ", k_kbn";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",3";
		$sql= $sql . "," . $k_flg_3;
		$sql= $sql . ",1";
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	if($datMc["vnum_4"] == OK_CODE){
		$sql="";
		$sql= $sql . "INSERT INTO t_vitems (";
		$sql= $sql . " mc_id";
		$sql= $sql . ", vnum";
		$sql= $sql . ", k_flg";
		$sql= $sql . ", k_kbn";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $getDat["mc_id"];
		$sql= $sql . ",4";
		$sql= $sql . "," . $k_flg_4;
		$sql= $sql . ",1";
		$sql= $sql . ",now()";
		$sql= $sql . ");";
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	$ret=TRUE;
	return $ret;
}


//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_getResponse(  $getDat, $datMc ){
	$ret ="000000000000000000000000";
	$ret2="";
	$k_flg_1 =Is_validValve($getDat["snum_1"], $datMc["moi_num"] );
	$k_flg_2 =Is_validValve($getDat["snum_2"], $datMc["moi_num"] );
	$k_flg_3 =Is_validValve($getDat["snum_3"], $datMc["moi_num"] );
	$k_flg_4 =Is_validValve($getDat["snum_4"], $datMc["moi_num"] );	
	   
	$ret2  = OK_CODE;
	$ret2 = $ret2 . ER_STAT_000;
	$ret2 = $ret2 . CM001_getZeroStr($datMc['moi_num'] ,4);
	if($datMc["vnum_1"]== OK_CODE){
		$ret2 = $ret2 . $k_flg_1;
	}else{
		$ret2 = $ret2 . NG_CODE;
	}
	if($datMc["vnum_2"]== OK_CODE){
		$ret2 = $ret2 . $k_flg_2;
	}else{
		$ret2 = $ret2 . NG_CODE;
	}
	if($datMc["vnum_3"]== OK_CODE){
		$ret2 = $ret2 . $k_flg_3;
	}else{
		$ret2 = $ret2 . NG_CODE;
	}
	if($datMc["vnum_4"]== OK_CODE){
		$ret2 = $ret2 . $k_flg_4;
	}else{
		$ret2 = $ret2 . NG_CODE;
	}
	$ret2 = $ret2 . CM001_getZeroStr($datMc['kai_num_1'] ,3);
	$ret2 = $ret2 . CM001_getZeroStr($datMc['kai_num_2'] ,3);
	$ret2 = $ret2 . CM001_getZeroStr($datMc['kai_num_3'] ,3);
	$ret2 = $ret2 . CM001_getZeroStr($datMc['kai_num_4'] ,3);
	$ret  = substr($ret2, 0, 24);
	return $ret;
}
//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return TRUE: opne-Valve
//------------------------------------
function Is_validValve($iSen, $iMoi ){
	$ret=NG_CODE;
	
	if($iMoi > $iSen){
		$ret =OK_CODE;
	}
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_saveWkValve_4($db, $sv_id ,$url){
	$ret=FALSE;
	
	$items = com_load_csv($url);
	foreach($items as $item){
		$sql="";
		$sql= $sql . "INSERT INTO wk_vitems (";
		$sql= $sql . " sv_id";
		$sql= $sql . " ,mc_id";
		$sql= $sql . " ,vnum";
		$sql= $sql . " ,k_flg";
		$sql= $sql . " ,k_kbn";
		$sql= $sql . " ,tr_id";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $sv_id;
		$sql= $sql . ","  . $item[0] ;
		$sql= $sql . "," .  $item[1];
		$sql= $sql . "," .  $item[2];
		$sql= $sql . "," .  $item[3];
		$sql= $sql . "," .  $item[5];
		$sql= $sql . ",'" . $item[4] ."'";
		$sql= $sql . ");";		
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	$ret=TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_saveWkValve($db, $sv_id ,$datPost){
	$ret=FALSE;
	
	$items = json_decode($datPost, true);
	for ($i = 0; $i< count($items); $i++) {
		$item = $items[$i];
		$sql="";
		$sql= $sql . "INSERT INTO wk_vitems (";
		$sql= $sql . " sv_id";
		$sql= $sql . " ,mc_id";
		$sql= $sql . " ,vnum";
		$sql= $sql . " ,k_flg";
		$sql= $sql . " ,k_kbn";
		$sql= $sql . " ,tr_id";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $sv_id;
		$sql= $sql . ","  . $item["mc_id"] ;
		$sql= $sql . "," .  $item["vnum"];
		$sql= $sql . "," .  $item["k_flg"];
		$sql= $sql . "," .  $item["k_kbn"];
		$sql= $sql . "," .  $item["id"];
		$sql= $sql . ",'" . $item["created"] ."'";
		$sql= $sql . ");";		
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	$ret=TRUE;
	return $ret;
}


//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_saveWkSen_4($db, $sv_id ,$url){
	$ret=FALSE;
	
	$items = com_load_csv($url);
	foreach($items as $item){
		$sql="";
		$sql= $sql . "INSERT INTO wk_sensors (";
		$sql= $sql . " sv_id";
		$sql= $sql . " ,tr_id";
		$sql= $sql . " ,mc_id";
		$sql= $sql . " ,vnum";
		$sql= $sql . " ,snum";
		
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $sv_id;
		$sql= $sql . ","  . $item[4];
		$sql= $sql . ","  . $item[0];
		$sql= $sql . "," .  $item[1];
		$sql= $sql . "," .  $item[2];
		$sql= $sql . ",'" . $item[3] ."'";
		$sql= $sql . ");";		
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	$ret=TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_saveWkSen($db, $sv_id ,$datPost){
	$ret=FALSE;
	
	$items = json_decode($datPost, true);
	for ($i = 0; $i< count($items); $i++) {
		$item = $items[$i];
		$sql="";
		$sql= $sql . "INSERT INTO wk_sensors (";
		$sql= $sql . " sv_id";
		$sql= $sql . " ,tr_id";
		$sql= $sql . " ,mc_id";
		$sql= $sql . " ,vnum";
		$sql= $sql . " ,snum";
		
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $sv_id;
		$sql= $sql . ","  . $item["id"] ;
		$sql= $sql . ","  . $item["mc_id"] ;
		$sql= $sql . "," .  $item["vnum"];
		$sql= $sql . "," .  $item["snum"];
		$sql= $sql . ",'" . $item["created"] ."'";
		$sql= $sql . ");";		
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	$ret=TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_saveWkMst($db, $sv_id ,$datPost){
	$ret=FALSE;
	
	$items = json_decode($datPost, true);
	for ($i = 0; $i< count($items); $i++) {
		$item = $items[$i];
		$sql="";
		$sql= $sql . "INSERT INTO wk_mcs (";
		$sql= $sql . " sv_id";
		$sql= $sql . " ,mc_id";
		$sql= $sql . " ,mc_name";
		$sql= $sql . " ,moi_num";
		$sql= $sql . " ,kai_num_1";
		$sql= $sql . " ,kai_num_2";
		$sql= $sql . " ,kai_num_3";
		$sql= $sql . " ,kai_num_4";
		$sql= $sql . " ,vnum_1";
		$sql= $sql . " ,vnum_2";
		$sql= $sql . " ,vnum_3";
		$sql= $sql . " ,vnum_4";
		$sql= $sql . " ,ck_num";
		$sql= $sql . ", created";
		$sql= $sql . ") values (";
		$sql= $sql . $sv_id;
		$sql= $sql . ","  . $item["mc_id"] ;
		$sql= $sql . ",'" . $item["mc_name"] . "'";
		$sql= $sql . "," . $item["moi_num"];
		$sql= $sql . "," . $item["kai_num_1"];
		$sql= $sql . "," . $item["kai_num_2"];
		$sql= $sql . "," . $item["kai_num_3"];
		$sql= $sql . "," . $item["kai_num_4"];
		$sql= $sql . "," . $item["vnum_1"];
		$sql= $sql . "," . $item["vnum_2"];
		$sql= $sql . "," . $item["vnum_3"];
		$sql= $sql . "," . $item["vnum_4"];
		$sql= $sql . "," . $item["ck_num"];
		$sql= $sql . ",'" . $item["created"] ."'";
		$sql= $sql . ");";
var_dump( "sql=". $sql);
		
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	$ret=TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_fileMst( $sv_id ,$datPost, $fnm ){
	$ret=FALSE;
	
	unlink( $fnm );
	$fp = fopen($fnm, "a");
	if ($fp){
	  if (flock($fp, LOCK_EX)){
		if (fwrite($fp, $datPost) === FALSE){
			var_dump("file write error.");
			return $ret;
		}
	  }
	}
    fclose($fp);
    $ret=TRUE;
    return $ret;
}


//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_saveWkMst_4($db, $sv_id ,$url){
	$ret=FALSE;
	
	$items = com_load_csv($url);
	foreach($items as $item){
		$sql= "INSERT INTO wk_mcs (";
		$sql= $sql . " sv_id";
		$sql= $sql . " ,mc_id";
		$sql= $sql . " ,moi_num";
		$sql= $sql . " ,kai_num_1";
		$sql= $sql . " ,vnum_1";
		$sql= $sql . " ,kai_num_2";
		$sql= $sql . " ,vnum_2";
		$sql= $sql . " ,kai_num_3";
		$sql= $sql . " ,vnum_3";
		$sql= $sql . " ,kai_num_4";
		$sql= $sql . " ,vnum_4";
		$sql= $sql . " ,ck_num";
		$sql= $sql . " ,created";
		$sql= $sql . " ,mc_name";
		$sql= $sql . ") values (";
		$sql= $sql . $sv_id;
		$sql= $sql . ","  . $item[0] ;
		$sql= $sql . ","  . $item[1] ;
		$sql= $sql . ","  . $item[2] ;
		$sql= $sql . ","  . $item[3] ;
		$sql= $sql . ","  . $item[4] ;
		$sql= $sql . ","  . $item[5] ;
		$sql= $sql . ","  . $item[6] ;
		$sql= $sql . ","  . $item[7] ;
		$sql= $sql . ","  . $item[8] ;
		$sql= $sql . ","  . $item[9] ;
		$sql= $sql . ","  . $item[10] ;
		$sql= $sql . ",'" . $item[11]  . "'";
		$sql= $sql . ",'" . $item[12]  . "'";
		$sql= $sql . ");";
// var_dump( "sql=". $sql);
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	$ret=TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
//function com_saveWkMst_3($db, $sv_id ,$datPost){
function com_saveWkMst_3($db, $sv_id ,$url){
	$ret=FALSE;
//	$items = new SimpleXMLElement($datPost);
	$items = simplexml_load_file($url);
// var_dump( $items );
	foreach($items->item as $item){
		$sql= "INSERT INTO wk_mcs (";
		$sql= $sql . " sv_id";
		$sql= $sql . " ,mc_id";
		$sql= $sql . " ,moi_num";
//		$sql= $sql . " ,mc_name";
		//
		$sql= $sql . ") values (";
		$sql= $sql . $sv_id;
		$sql= $sql . ","  . $item->mc_id ;
		$sql= $sql . ",'" . $item->mc_name . "'";
		$sql= $sql . "," . $item->moi_num;
		$sql= $sql . ");";
var_dump( "sql=". $sql);
		$result = $db->Exec_NonQuery( $sql );
		if ($result == false) {
			return $ret;
		}
	}
	$ret=TRUE;
	return $ret;
}
//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_savePost($db, $sv_id ,$datPost){
	$ret=FALSE;
	
	$sql="";
	$sql= $sql . "INSERT INTO t_mlogs (";
	$sql= $sql . " mc_id";
	$sql= $sql . ",txt_log";
	$sql= $sql . ", created";
	$sql= $sql . ") values (";
	$sql= $sql . $sv_id;
	$sql= $sql . ",'" . $datPost . "'";
	$sql= $sql . ",now()";
	$sql= $sql . ");";
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}
	
	$ret=TRUE;
	return $ret;
}


//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function com_saveLog($db, $getDat, $datMc ){
	$ret=FALSE;
	
	$s_log ="";
	$s_log ="MC-ID=" . $getDat["mc_id"];
	$s_log = $s_log . " ,SNUM-1=" . $getDat["snum_1"];
	$s_log = $s_log . " ,SNUM-2=" . $getDat["snum_2"];
	$s_log = $s_log . " ,SNUM-3=" . $getDat["snum_3"];
	$s_log = $s_log . " ,SNUM-4=" . $getDat["snum_4"];	
	
	$sql="";
	$sql= $sql . "INSERT INTO t_mlogs (";
	$sql= $sql . " mc_id";
	$sql= $sql . ",txt_log";
	$sql= $sql . ", created";
	$sql= $sql . ") values (";
	$sql= $sql . $getDat["mc_id"];
	$sql= $sql . ",'" . $s_log . "'";
	$sql= $sql . ",now()";
	$sql= $sql . ");";
	$result = $db->Exec_NonQuery( $sql );
	if ($result == false) {
		return $ret;
	}
	
	$ret=TRUE;
	return $ret;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function _get_element( $pElement, $pSource ) {
   $_data = null;
   $pElement = strtolower( $pElement );
   $_start = strpos( strtolower( $pSource ), chr(60) . $pElement, 0 );
   $_start = strpos( $pSource, chr(62), $_start ) + 1;
   $_stop = strpos( strtolower( $pSource ), "</" . $pElement .    chr(62), $_start );
   if( $_start > strlen( $pElement ) && $_stop > $_start ) {
      $_data = trim( substr( $pSource, $_start, $_stop - $_start ) );
   }
   return( $_data );
}

//------------------------------------
// @calling : 時間(int)の差分時間を求める。
// @purpose :
// @date
// @argment : 
// @return  : 差分時間(分)
//------------------------------------
function CM001_getDiff_mm($start_hh, $start_mm ,$end_hh, $end_mm){

	$st_dt   = mktime($start_hh    , $start_mm    , 0, 1, 1, 2000 );
	$end_dt  = mktime($end_hh      , $end_mm      , 0, 1, 1, 2000 );
	$diff_mm = $end_dt - $st_dt;
    $diff_mm = $diff_mm / 60;

return $diff_mm;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return : bool
//------------------------------------
function Com_checkAgent(){
	$clsConst = new AppConst();
	
	$s_buf = $_SERVER["HTTP_USER_AGENT"];

	$i_pos = strpos($s_buf , "MSIE");
	if( $i_pos != false){
	  $_SESSION["CM001"]["HTTP_USER_AGENT"]= $clsConst->VAL014_WEB_IE ;
	  return true;
	}
//var_dump($i_pos);
// exit;

	$i_pos_ch = strpos($s_buf , "Chrome");
	if (($i_pos == false) && ($i_pos_ch == false)) {
		return false;
	}
	
	return true;
}

//------------------------------------
// @calling
// @purpose
// @date
// @argment
// @return
//------------------------------------
function Com_logWrite($msg){
	$s_time = date("Y/m/d H:i:s");
	
	if(LOG_FLG==true){
		error_log($s_time  . " ". $msg . "\r\n" ,3, LOG_FNAME);
	//	error_log($s_time  . " ". $msg . "\n" ,3, LOG_FNAME);
	}
}
//
function init() {
	//MySmartyクラスの読み込み
	require_once($_SERVER["DOCUMENT_ROOT"]. "/../libs/MySmarty.class.php");
	
	//セッションを開始する
	session_start();
	session_regenerate_id(true);

}


?>