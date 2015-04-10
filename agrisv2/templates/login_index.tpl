<div class="container">
<h1 style="color : gray; margin-top:50px;">{$title_message}</h1>
<form class="form-horizontal" name='form1' id="form1" action="{$PHP_DIR}/login_index.php" method='post'>
<h3 style="color:red; ">{$flash_notice}</h3>
<input type="hidden" name="h_check" id="h_check"  value="1"/>
  <div style="margin-top:50px;" class="form-group">
        <label class="col-sm-2" for="">User Name</label>
	<div class="col-sm-3">
	<input type="text" class="form-control" maxlength="40" name="txt_user_name" id="txt_user_name" placeholder="user123" value="{$cook_user_name}">
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-2" for="">Password</label>
	<div class="col-sm-3">
    <input type="password" class="form-control" maxlength="40" name="txt_pass" id="txt_pass" placeholder="password" value="">
	</div>
  </div>

<hr />
<a href="#" id="id_login_check" class="btn btn-primary  btn-lg"> Login
</a>
   </form>
</div>




