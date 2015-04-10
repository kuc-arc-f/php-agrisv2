//------------------------------------
// @calling : 
// @purpose :
// @date    :
// @argment :
// @return  :
//------------------------------------

function show_mc(dir, id ){
	alert('mc');
  //window.location.href=dir + "/mc_index.php?sv_id="+id;
  w = window.open(dir + "/mc_index.php?sv_id="+id, "_blank" );
};

function show_report(dir, id, mmdd, sv_id){
//  w = window.open(dir + "/mc_show.php?id="+id+"&mmdd="+mmdd +"&sv_id="+sv_id , "_blank" );
  w = window.open(dir + "/mc_show.php?id="+id+"&mmdd="+mmdd, "_blank" );
};

function edit_mc(dir, id ){
  w = window.open(dir + "/mc_edit.php?id="+id, "_blank" );
};

onload = function() {
};

