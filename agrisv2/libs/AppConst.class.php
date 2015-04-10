<?PHP
class AppConst {
	var $val01 = 'val01_###';
	var $SYS_NAME_AGRI = "KUC.Agri Cloud";
	
	// Const
	var $NEXT_INTERVAL= 90;
	var $VAL001_IMAGE_NORMAL ="00_default.png";
	var $VAL001_PAGE_MAX = 10;
	var $VAL003_PAGE_TEST= 10;
	var $VAL004_Pager_Delta= 10;
	var $VAL005_Pager_NextImg   = "Next &gt;&gt;";
	var $VAL006_Pager_PrevtImg  ="&lt;&lt; Before";
	var $VAL007_MAX_NUM_KINTAI =  30;
	var $VAL008_MAX_AUTO       = 100;
	var $VAL009_MAX_GET_REST   = 70;
	var $VAL013_MAX_USER_NUM   = 100;
	var $VAL014_WEB_IE         = "IE";

	// Message
	var $MSG_001 = 'Copyright 2009-2015,  All right reserved.';
	var $MSG_002 = "kuc.Memo";
	var $MSG_003 = "kuc.Memo for php";
	var $MSG_004 = "Trial version";
	var $MSG_005 = "Delete, OK?";
	var $MSG_006 = "Update, OK?";
	var $MSG_011 = "## START: /api_init";
	var $MSG_012 = "Receive ms";
	var $MSG_013 = "Receive sensor";
	var $MSG_014 = "Receive valve";
	var $MSG_015 = "## Conmlete /api_complete";

	// Message_ERROR
	var $MSG_ERROR_001 = "Argment Error";
	var $MSG_ERROR_003 = "Over GetCount";
	var $MSG_ERROR_004 = "Data Insert Error";
	var $MSG_ERROR_005 = "Data Update Error";
	var $MSG_ERROR_006 = "Data Delete Error";
	var $MSG_ERROR_007 = "sorry, Max Account Over.. this System";
	var $MSG_ERROR_008 = "Data Select Error";
	var $MSG_ERROR_009 = "sorry, this System IE or Chrome required.";
	var $MSG_ERROR_010 = "failue, Nothing ,data .";

	var $MSG_001_TEST = '##MSG_001_TEST';
	var $MSG_002_TEST = '##MSG_00[21_TEST';
	public $PUBLIC_DIR = "/public";

	function __construct(){
	}
	
}
?>