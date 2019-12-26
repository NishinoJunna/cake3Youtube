var nb = null;
$(function(){
 	$('.del').on('click',ad1);
 });
/*<p>全て削除をよろしいですか?</p>
<input type="button" id="yes" value="はい" />&nbsp;&nbsp;<input type="button" id="non" value="いええ" />*/
function ad1(){
		
		var nb_box = $(".del");
		var rank = nb_box.index(this);
 	 	console.log(rank);
 	 	nb = rank;
 	 	$('#ask' + nb).append(
 	 			`<p>全て削除をよろしいですか?</p>
 	 			<input type="button" id="yes" value="はい" />&nbsp;&nbsp;<input type="button" id="non" value="いええ" />`);
 	 	$('#yes').on('click',ad2);
 	 	$('#non').on('click',ad3);
		return false;
};
function ad2(){
	
	console.log($('#nb' + nb).val());
	window.location.href = "http://localhost/cake3youtube/admin/playlists/delete/" + $('#nb' + nb).val();
	return false;
};
function ad3(){
	$('#ask' + nb).html("");
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