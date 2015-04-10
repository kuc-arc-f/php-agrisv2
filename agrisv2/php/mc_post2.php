<?php

//------------------------------------
// @calling
// @purpose : 
// @date
// @argment
// @return
//------------------------------------
include_once("../libs/AppCom.php");

	$clsConst = new AppConst();
	$db     =new ComMysql();
	
	session_start();
	$ret_base= "000000000000000000000000";
	$sHEAD ="web-response1=";
	
	if(isset($_GET["mc_id"])){
		if(isset($_GET["rkey"])){
			$datMc = com_getMcDat($db, $_GET["mc_id"] );
	//var_dump($datMc);
			if($datMc==NULL){
				echo $sHEAD . NG_CODE . ER_STAT_102 .$ret_base;
			}else{
				if(com_isValidKey($db, $_GET["rkey"] )==FALSE){
					   echo $sHEAD . NG_CODE . ER_STAT_104 .$ret_base;
					   exit;
				}
				if(com_saveLog($db, $_GET, $datMc[0] )==FALSE){
					   echo $sHEAD . NG_CODE . ER_STAT_101 .$ret_base;
					   exit;
				}
				if(com_Is_addSensor($db, $_GET["mc_id"], 300 )){
					if(com_saveSensor($db, $_GET, $datMc[0] ) ==FALSE){
					   echo $sHEAD . NG_CODE . ER_STAT_101 .$ret_base;
					   exit;
					}
				}
				if(com_Is_addValve($db, $_GET["mc_id"],  $datMc[0]["ck_num"] )){
					if(com_saveValve($db, $_GET, $datMc[0] ) ==FALSE){
					   echo $sHEAD . NG_CODE . ER_STAT_101 .$ret_base;
					   exit;
					}
					$resOK = com_getResponse(  $_GET, $datMc[0] );
				    echo $sHEAD . $resOK;
				}else{
				    echo $sHEAD . NG_CODE . ER_STAT_103 .$ret_base;
				}			
			}
		}
	}else{
	  echo $sHEAD . $ret_base;
	}

?>