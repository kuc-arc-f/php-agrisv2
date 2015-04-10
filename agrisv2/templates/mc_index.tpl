<script src="{$PUBLIC_DIR}/js/app_mc_index.js" type="text/javascript"></script>
<div class="container">
  <div class="row">
    <div class="col-sm-12" style="margin-bottom: 10px;">&nbsp;<h2 style="color: green;">{$title_message}</h2>
    </div>
  </div>

	<table style="width:100%;" class="table table-striped table-hover">
	<tbody>
	  <tr>
		<th>ID</th>
		<th>micon<br />name</th>
		<th>update<br />Last</th>
		<th>moisture<br />Limit</th>
		<th>Valve <br />open</th>
		<th>Valve<br />1</th>
		<th>Valve<br />2</th>
		<th>Valve<br />3</th>
		<th>Valve<br />4</th>
		<th>next <br />Check</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	  </tr>
{foreach from =$result item="dat" key="key" name="loopName"}
	  <tr height="60px" >
		<td>{$dat.id }</td>
		<td onClick="show_report('{$PHP_DIR}' , {$dat.id } , '{$s_nowStr}');">
		<p style="font-size : 18;">{$dat.mc_name}</p></td>
		<td onClick="show_report('{$PHP_DIR}' , {$dat.id } , '{$s_nowStr}');">
		{$dat.up_last}</td>
		<td onClick="show_report('{$PHP_DIR}' , {$dat.id } , '{$s_nowStr}');">{$dat.moi_num}
		</td>
		<td onClick="show_report('{$PHP_DIR}' , {$dat.id } , '{$s_nowStr}');">{$dat.kai_num_1}
		</td>
		<td onClick="show_report('{$PHP_DIR}' , {$dat.id } , '{$s_nowStr}');">
{if ($dat.vnum_1=="1")}
<font color="blue">ON</font>
{else}
-
{/if}

		</td>
		<td onClick="show_report('{$PHP_DIR}' , {$dat.id } , '{$s_nowStr}');">
{if ($dat.vnum_2=="1")}
<font color="blue">ON</font>
{else}
-
{/if}
		</td>
		<td onClick="show_report('{$PHP_DIR}' , {$dat.id } , '{$s_nowStr}');">
{if ($dat.vnum_3=="1")}
<font color="blue">ON</font>
{else}
-
{/if}
		</td>
		<td onClick="show_report('{$PHP_DIR}' , {$dat.id } , '{$s_nowStr}');">
{if ($dat.vnum_4=="1")}
<font color="blue">ON</font>
{else}
-
{/if}
		</td>
		<td>{$dat.ck_num }</td>
		  <td>
			<A HREF="#" onClick="show_report('{$PHP_DIR}' , {$dat.id  } , '{$s_nowStr}'  );">
			<button class="btn btn-default btn-lg"> Detail </button>
			</A>
		  </td>
		  <td>
			<A HREF="{$PHP_DIR}/mc_edit.php?id={$dat.id}" class="btn btn-default" > Edit <i class="glyphicon glyphicon-pencil"></i>
			</A>
		  </td>
	  </tr>

{/foreach}
	</tbody>
	</table>
<A HREF="{$PHP_DIR}/mc_add.php">
<button class="btn btn-success"> Add </button>
</A>
</div>
<!-- --> 
<div id="store">
    <!-- End_Main -->
  </div> 
</div>
</body>
</html>

