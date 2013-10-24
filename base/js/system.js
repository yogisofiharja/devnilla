function bacaEmail(id){
	$.ajax({
		url:'http://localhost/devnilla/admin/get/singleMail/'+id,
		dataType:'json',
		cache:false,
		success:function(msg){
			console.log(msg);			
		} 
	});
}

function setRead(id){
	$.post("http://localhost/devnilla/admin/post/setEmailRead",{
		id:id
	},"json");
}
