$(function(){
	var index = 1;
	
	$(".before").click(function(){
		var test= $(this).find();
		$(this).addClass("after_click");
		$(this).removeClass("before");
		console.log(test);
		console.log(test.context.innerText);
		
		$(`#${index}`).append(test.context.innerHtml);
		index++;
	})
})