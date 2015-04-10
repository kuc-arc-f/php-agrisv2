<script src="{$PUBLIC_DIR}/js/inputchk.js" type="text/javascript"></script>
<div class="container">
<h1 style="color : gray; margin-top:50px;">{$title_message}</h1>
<form class="form-horizontal" name='form1' id="form1" action="{$PHP_DIR}/signup_new.php" method='post'>
<input type="hidden" name="h_mc_id" id="h_mc_id"  value="{$h_mc_id}"/>
  <div style="margin-top:50px;" class="form-group">
        <label class="col-sm-2" for="">User Name<br />(4-12)</label>
	<div class="col-sm-3">
	<input type="text" class="form-control" maxlength="12" name="txt_user_name" id="txt_user_name" placeholder="user123" value="">
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-2" for="">Password</label>
	<div class="col-sm-3">
    <input type="password" class="form-control" maxlength="10" name="txt_pass" id="txt_pass" placeholder="password" value="">
	</div>
  </div>

<hr />
<a href="#" id="id_signup_new" class="btn btn-primary  btn-lg"> Save
</a>
   </form>
</div>




