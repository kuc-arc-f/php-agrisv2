<div class="container">
  <div class="row">
    <div style="color:green;">&nbsp;<h1>{$title_message}</h1>
    </div>
  </div>
	<table style="width:100%;" class="table table-striped table-hover">
	<tbody>
	<tr>
	 <th>Date</th>
	 <th>Log</th>
	</tr>
{foreach from =$result item="dat" key="key" name="loopName"}
	<tr >
		<td  style="font-weight :bold; color: #227"> 
		&nbsp;{$dat.cre_date }
		</td>
		<td >&nbsp;{$dat.txt_log} </td>
	</tr>
{/foreach}
	</tbody>
	</table>
</div>
</body>
</html>

