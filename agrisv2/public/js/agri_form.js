//------------------------------------
// @calling : 
// @purpose :
// @date    :
// @argment :
// @return  :
//------------------------------------

onload = function() {
	/*
  $('a.btn-delete').click(function(e){
	if(confirm('delete [micon] OK? ID=' + $('input#h_mc_id').val())){
	  location.href="/agri/php/mc_delete.php?id="+ $('input#h_mc_id').val();
	}
  });
	*/
  $('a#btn-save-new').click(function(e){
  	 var sName= $('input#txt_mc_name').val();
   if( sName==''){
     alert('Failure, [Micon name ] is Input ,require');
     return false;
   }
  	document.form1.submit();
  });
  
  $('a#btn-save-edit').click(function(e){
  	 var sName= $('input#txt_mc_name').val();
   if( sName==''){
     alert('Failure, [Micon name ] is Input ,require');
     return false;
   }
  	document.form1.submit();
  });
  
  $('a#btn-save-sv-new').click(function(e){
  	 var sName= $('input#txt_sv_name').val();
   if( sName==''){
     alert('Failure, [Server name ] is Input ,require');
     return false;
   }
  	document.form1.submit();
  });
  
  $('a#btn-save-sv-edit').click(function(e){
  	 var sName= $('input#txt_sv_name').val();
   if( sName==''){
     alert('Failure, [Server name ] is Input ,require');
     return false;
   }
  	document.form1.submit();
  });
	$('a#id_signup_new').click(function(e){
	  var sName= $('input#txt_user_name').val();
	  var sPass= $('input#txt_pass').val();
		if( sName==''){
		  alert('Failure, [User name ] is Input ,require');
		  return false;
		}
		if( sPass==''){
		  alert('Failure, [Password] is Input ,require');
		  return false;
		}
		if(sName.length < 4){
		  alert('Failure, [User name ] is 4 char over, require');
		  return false;
		}

		if (!inStrChk("form1",null,"txt_user_name" ,null, 12,1,1,0,0,"User Name")){
		  return false;
		}
   
	  document.form1.submit();
	});
	$('a#id_login_check').click(function(e){
// alert('#id_login_check');
	  document.form1.submit();
	});	
  
};

function form_delete_sv(path , id){
	if(confirm('delete [Server] OK? ID=' + id )){
	  location.href=path + "?id="+ id;
	}
}
function form_logout(url){
	if(confirm('Logout System,OK?')){
		 location.href=url;
	}
}

function delete_micon(sPath){
	if(confirm('delete [micon] OK? ID=' + $('input#h_mc_id').val())){
//	  location.href="/agri/php/mc_delete.php?id="+ $('input#h_mc_id').val();
	  location.href=sPath +"?id="+ $('input#h_mc_id').val();
	}
}