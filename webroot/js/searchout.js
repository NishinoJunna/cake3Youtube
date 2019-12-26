$(function(){
      	$('#searchout1').on('click',quest);
 	 });

function quest(){
		window.location.href = "http://localhost/cake3youtube/?keyword=" + $("#keyword").val();
		return false;
};