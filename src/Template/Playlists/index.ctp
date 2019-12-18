<?php $this->prepend('script', $this->Html->script('admin_search')); ?>
<form>
				<input type="text" id="keyword" value="game" />
				<input type="button" id="btn1" value="検索" />
			</form>
<div id="search">
	<div id="container">
		<div id="loading"></div>
		<div id="header">
			
		</div>
		<div id="main"></div>
	</div>
 </div>
 
 <div id="play" style="display: none">
<div id="container">
        <div id="loading"></div>
        <div id="header">
            <form>
                
                <input type="button" value=" < <" id="prev" />
		        <input type="button" value="再生" id="exe" />
		        <input type="button" value=" > > " id="next" />
            </form>
        </div>
      
        <div id="main_box" class="clearfix">
        	
        	
        	
        	<div id="movie_title"><a></a></div>
            <div id="player" class="pull-left"></div>
            <div id="related" class="pull-left"></div>
            <div id="movie_description"></div>
        </div>
    </div>
</div>
<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>