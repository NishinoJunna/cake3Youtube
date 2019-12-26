$(function(){
	var index=1;
	$(".after_shuffle_box").hide();
	
	 jQuery( '.shuffle_left_container' ) . sortable();
	 jQuery( '.shuffle_left_container' ) . disableSelection();
	 
	 $('.shuffle_left_container').sortable({
         update : function(ev, ui) {
             console.log($(this).sortable("toArray"));
             var count = $(this).children().length;
             for(var i=0;i<count;i++){
            	 $a = $(".shuffle_left_container p.number").eq(i).html(i+1);
             }
         }
     });
	 
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