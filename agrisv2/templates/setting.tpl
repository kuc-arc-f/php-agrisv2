<script src="{$PUBLIC_DIR}/js/agri_form.js" type="text/javascript"></script>
<div class="container">
  <h1 style="color : gray;">{$title_message}</h1>
  <form class="form-horizontal" name='form1' id="form1" action="{$PHP_DIR}/mc_edit_up.php" method='post'>
  <div class="form-group">
        <label class="col-sm-2" for="">Rest-Key</label>
	<div class="col-sm-3">
	<input type="text" class="form-control" maxlength="40" name="txt_mc_name" id="txt_mc_name"  value="{$sCode}">
	</div>
	<div class="col-sm-7">
	</div>
  </div>

<hr />
  </form>

<a href="{$BM_ROOT_DIR}/">
<button class="btn btn-default btn-lg"> Back </button>
</a>
</div>




