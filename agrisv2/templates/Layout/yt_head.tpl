<!DOCTYPE html>
<html style="margin: 0px; padding: 0px;">
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <title>{$APP_CONST->SYS_NAME_AGRI}</title>
    <link href="{$PUBLIC_DIR}/bootstrap-3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="{$PUBLIC_DIR}/js/jquery-1.10.2.min.js" type="text/javascript"></script> 
    <script src="{$PUBLIC_DIR}/bootstrap-3.1.0/js/bootstrap.min.js"></script>
    <script src="{$PUBLIC_DIR}/js/agri_form.js" type="text/javascript"></script>
    <link href="{$PUBLIC_DIR}/css/app_main.css" rel="stylesheet">
</head>
<body style="font-family:Arial; margin: 0px; padding: 0px;">
  <nav class="navbar  navbar-default" role="navigation" style="margin-bottom:0px;  background-color: #90ee90;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
            <a class="navbar-brand" href="{$BM_ROOT_DIR}/"><font style="color:green;">{$APP_CONST->SYS_NAME_AGRI}</font>
            </a>
        </li>
        <li>
            <a href="{$BM_ROOT_DIR}/" style="margin-left:100px;">| Home |
            </a>
        </li>
        <li>
            <a href="{$PHP_DIR}/log_index.php" > Log |
            </a>
        </li>
        <li>
            <a href="{$PHP_DIR}/setting.php"> Setting |
            </a>
        </li>

      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li id="id-li-setting">
            <a href="#id-modal-info" data-toggle="modal">About</a>
	</li>
        <li>
            <a href="#" onClick="form_logout('{$PHP_DIR}/login_index.php?logout=1');" id="id-logout"> | Logout 
            </a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



