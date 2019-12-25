$(function(){
	var index=1;
	$(".after_shuffle_box").hide();
	
	 jQuery( '.shuffle_left_container' ) . sortable();
	    jQuery( '.shuffle_left_container' ) . disableSelection();
	    jQuery( '.submit' ) . click( function() {
	    	var result = $(".shuffle_left_container").sortable("toArray");
	    	console.log(result);
	    	$("#result").val(result);
	    	console.log("aaa");
	    	 $("form").submit();
	    } );
	
	  /* $(".before").click(function(){
		var test= $(this).html();
		if(test != ""){
		
			var id= $(this).attr('id');
			
			console.log(id);
			$(this).html("");
			$(this).attr("style","");
			$(this).removeClass("before");
			$(`#${index}`).append(test).show();
			$(`#${index}`).children("input").attr('value',id)
			
			/*追加
			var selected = document.getElementById(id);
			selected.parentNode.removeChild(selected);
			
			index ++;
		}
	})*/
	
})