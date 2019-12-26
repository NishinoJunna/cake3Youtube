$(function(){
 	$('#btn10').on('click',admi);
 });

function admi(){
		window.location.href = "http://localhost/cake3youtube/admin/homes/index?keyword=" + $("#keyword").val();
		return false;
};