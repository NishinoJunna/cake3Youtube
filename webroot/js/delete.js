var nb = null;
$(function(){
 	$('.btn').on('click',admin1);
 	$('#yes').on('click',admin2);
 	$('#non').on('click',admin3);
 	
 });

function admin1(){
		$('#ask').show();
		var nb_box = $(".btn");
		var rank = nb_box.index(this);
 	 	console.log(rank);
 	 	nb = rank;
		
		return false;
};
function admin2(){
	console.log($('#nb' + nb).val());
	window.location.href = "http://localhost/cake3youtube/admin/playlists/delete/" + $('#nb' + nb).val();
	return false;
};
function admin3(){
	$('#ask').hide();
	//window.location.href = "http://localhost/cake3youtube/admin/playlists/mylist";
	return false;
};

/*
<div id="ask" type ="hidden">
	<p>全て削除をよろしいですか?</p>
	<input type="button" id="yes" value="はい" />&nbsp;&nbsp;<input type="button" id="non" value="いええ" />
</div>


<div class="nb_box">
	<input type="hidden" id="nb<?= $i ?>" value="<?= $playlist->id ?>" />
	<input type="button" class="btn<?= $playlist->id ?>" value="プレイリストを削除する" />
<div>

<?php $this->prepend('script',$this->Html->script('delete')); ?>
*/