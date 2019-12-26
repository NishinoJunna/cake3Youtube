$(function(){
	$('#comm').on('click',commentRequest);
});

function commentRequest(event){
	
	adminOrderEditFormInit();
	var data = $('#commentAdd').serialize();
	
	console.log(data);
	$.ajax({
		url: "/cake3youtube/admin/comments/addcommentajax",
		type: "POST",
		data: data,
		dataType: "json",
		success: successAction,
		error: errorMessage,
		});
	}

	function adminOrderEditFormInit(){
		$('#message').remove();
		$('.help-block').remove();
		$('.form-group').removeClass('has-error');
	}
	function successAction(result){
		console.log(result);
		$('#commentAdd #comment').val("");
		$('.comment_box').html("");
		for(var key in result["content"]){
			
			$('.comment_box').append(
					`<p class='comment_username'>${result['user_name'][key]}</p>
					<p class= 'comment_content'>${result['content'][key]}</p>
					<p class= 'comment_date'>${result['created_at'][key]}</p>
					`);
		}
	}
	
	function errorMessage(result){
		alert("コメントを書いてください");
		console.log(result);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
