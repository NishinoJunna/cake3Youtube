<?php
echo $this->Form->create($movie,array("url"=>"/admin/movies/add"));
echo $this->Form->input("youtube_id",["type"=>"hidden","value"=>1]);
echo $this->Form->input("playlist_id",["options"=>$playlists,"empty"=>"プレイリストを選択","label"=>false]);
echo "<button type=\"submit\" class=\"movie_submit\">追加</button>";
echo $this->Form->end();
?>