<?php

// Smartyクラスを呼び出す
require_once("Smarty.class.php");

// Smartyクラスを継承したMySmartyクラスを作成する
class MySmarty extends Smarty {
	
	function MySmarty () {
		$clsConst = new AppConst();

		// テンプレートディレクトリの上書き
		 $this->template_dir   = BM_ROOT_DIR . "/templates";
		
		// コンパイルディレクトリの上書き
		 $this->compile_dir    = BM_ROOT_DIR . "/templates_c";
		
		$this->Smarty();
		
		// Const
		$base_dir   = BM_ROOT_URL;
		$this->assign("BM_ROOT_DIR", $base_dir );
		$this->assign("BM_ROOT_URL", $base_dir );
		$this->assign("PUBLIC_DIR"  , $base_dir . "/public");
		$this->assign("PHP_DIR"     , $base_dir . "/php");
		$this->assign("IMAGE_DIR"   , $base_dir . "/image");
		$this->assign("IMAGE_DIR_USER"   , $base_dir . "/image_user");
		$this->assign("BM_SERVER_NAME"    , YT_SERVER_NAME);
		$this->assign("APP_CONST"    , $clsConst);
	}
	
	//------------------------------------
	// @calling
	// @purpose
	// @date
	// @argment
	// @return
	//------------------------------------
	function disp_Layout ( $tpl_name ) {
		$this->display($this->template_dir . "/Layout/yt_head.tpl");
		$this->display($this->template_dir . "/" .$tpl_name );
		$this->display($this->template_dir . "/Layout/yt_foot.tpl");
	}
}
?>