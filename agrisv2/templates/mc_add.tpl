<script src="{$PUBLIC_DIR}/js/agri_form.js" type="text/javascript"></script>
<div class="container">

{if $form_type==2}
         <h1 style="color : gray;">[{$title_message}] id :{$h_mc_id}</h1>
	<form class="form-horizontal" name='form1' id="form1" action="{$PHP_DIR}/mc_edit_up.php" method='post'>
{else}
	<h1 style="color : gray;">{$title_message}</h1>
	<form class="form-horizontal" name='form1' id="form1" action="{$PHP_DIR}/mc_add_new.php" method='post'>
{/if}
<input type="hidden" name="h_mc_id" id="h_mc_id"  value="{$h_mc_id}"/>
<div class="form-group">
	<div class="col-sm-6" align="right">
{if $form_type==BM_FORM_TYP_EDIT }
		<A HREF="#" id="btn-save-edit">
		<button class="btn btn-primary btn-lg">Save</button>
		</A>

		&nbsp;&nbsp;
		<A HREF="#" class="btn btn-warning  btn-lg" onclick="delete_micon('{$PHP_DIR}/mc_delete.php');"> Delete 
		</A>
{else}
		<A HREF="#" id="btn-save-new">
		<button class="btn btn-primary btn-lg"> Save </button>
		</A>
		&nbsp;&nbsp
{/if}
	  </div>
</div>
  <div class="form-group">
        <label class="col-sm-2" for="">Micon Name</label>
	<div class="col-sm-3">
	<input type="text" class="form-control" maxlength="40" name="txt_mc_name" id="txt_mc_name" placeholder="Tomato-01" value="{$dat[0].mc_name }">
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-2" for="">Moisture Limit</label>
	<div class="col-sm-1">
{if $dat[0]==NULL}
    <input type="text" class="form-control" maxlength="4" name="txt_moi_num" id="txt_moi_num" placeholder="500" value="500">
{else}
    <input type="text" class="form-control" maxlength="4" name="txt_moi_num" id="txt_moi_num" placeholder="500" value="{$dat[0].moi_num }">
{/if}
	</div>
  </div>
  <div class="form-group">
        <label class="col-sm-2" for="">Valve Open (Sec)</label>
	<div class="col-sm-1">
{if $dat[0]==NULL}
	<input type="text" class="form-control" maxlength="4" name="txt_kai_num_1" id="txt_kai_num_1" placeholder="30" value="30">
{else}
	<input type="text" class="form-control" maxlength="4" name="txt_kai_num_1" id="txt_kai_num_1" placeholder="30" value="{$dat[0].kai_num_1 }">
{/if}
	</div>
  </div>
  <div class="form-group">
        <label class="col-sm-2" for="">Valve 1</label>
	<div class="col-sm-2">
	<select class="form-control"  name="txt_vnum_1" id="txt_vnum_1">
{if $dat[0].vnum_1=="1"}
	  <option value="1" selected >ON</option>
	  <option value="0">OFF</option>
{else}
	  <option value="1">ON</option>
	  <option value="0" selected>OFF</option>
{/if}
	</select>
	</div>
  </div>
  <div class="form-group">
        <label class="col-sm-2" for="">Valve 2</label>
	<div class="col-sm-2">
	<select class="form-control"  name="txt_vnum_2" id="txt_vnum_2">
{if $dat[0].vnum_2=="1"}
	  <option value="1" selected >ON</option>
	  <option value="0">OFF</option>
{else}
	  <option value="1">ON</option>
	  <option value="0" selected>OFF</option>
{/if}
	</select>
	</div>
  </div>
  <div class="form-group">
        <label class="col-sm-2" for="">Valve 3</label>
	<div class="col-sm-2">
	<select class="form-control"  name="txt_vnum_3" id="txt_vnum_3">
{if $dat[0].vnum_3=="1"}
	  <option value="1" selected >ON</option>
	  <option value="0">OFF</option>
{else}
	  <option value="1">ON</option>
	  <option value="0" selected>OFF</option>
{/if}
	</select>
	</div>
  </div>
  <div class="form-group">
        <label class="col-sm-2" for="">Valve 4</label>
	<div class="col-sm-2">
	<select class="form-control"  name="txt_vnum_4" id="txt_vnum_4">
{if $dat[0].vnum_4=="1"}
	  <option value="1" selected >ON</option>
	  <option value="0">OFF</option>
{else}
	  <option value="1">ON</option>
	  <option value="0" selected>OFF</option>
{/if}
	</select>
	</div>
  </div>
  <div class="form-group">
        <label class="col-sm-2" for="">Next Check (min)</label>
	<div class="col-sm-2">
	<select class="form-control"  name="txt_ck_num" id="txt_ck_num">
{if $dat[0] ==NULL }
	  <option value="600" >10min</option>
	  <option value="1200">20min</option>
	  <option value="1800" selected>30min</option>
	  <option value="3600">60min</option>
{else}
 {if $dat[0].ck_num=="600"}
	  <option value="600"selected>10min</option>
	  <option value="1200">20min</option>
	  <option value="1800">30min</option>
	  <option value="3600">60min</option>
 {/if}
 {if $dat[0].ck_num=="1200"}
	  <option value="600">10min</option>
	  <option value="1200"selected>20min</option>
	  <option value="1800">30min</option>
	  <option value="3600">60min</option>
 {/if}
 {if $dat[0].ck_num=="1800"}
	  <option value="600">10min</option>
	  <option value="1200">20min</option>
	  <option value="1800" selected>30min</option>
	  <option value="3600">60min</option>
 {/if}
 {if $dat[0].ck_num=="3600"}
	  <option value="600">10min</option>
	  <option value="1200">20min</option>
	  <option value="1800">30min</option>
	  <option value="3600" selected>60min</option>
 {/if}
{/if}
	</select>
	</div>
  </div>
   </form>
<hr />
<!--
 &nbsp;<a href="{$BM_ROOT_DIR}/">Back</a>
 -->
<a href="{$BM_ROOT_DIR}/">
<button class="btn btn-default btn-lg"> Back </button>
</a>
</div>




