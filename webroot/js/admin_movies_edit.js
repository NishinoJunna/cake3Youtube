$(function(){
	var index=1;
	$(".after_shuffle_box").hide();
	$(".before").click(function(){
		var test= $(this).html();
		
		$(this).addClass("after_click");
		var id= $(this).attr('id');
		
		console.log(id);
		$(this).removeClass("before");
		$(`#${index}`).append(test).show();
		$(`#${index}`).children("input").attr('value',id)
		
		index ++;
		
	})
})