$(function(){
      	$('#searchout1').on('click',qu1);
 	 });

function qu1(){
		window.location.href = "http://localhost/cake3youtube/?keyword=" + $("#keyword").val();
		return false;
};