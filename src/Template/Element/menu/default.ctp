
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<?=$this->Html->link("title","/" ,["class"=>"navbar-brand"]); ?>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
				<?=$this->Html->link("ログイン","/users/login"); ?>
				</li>
				<li class="dropdown">
				<?=$this->Html->link("ユーザ登録","/users/register"); ?>
				</li>
				<li class="dropdown">
					<div class="submit_search">
						<?php 
							echo $this->Form->create($search,['type' => 'get']);
							echo $this->Form->input('keyword',["label"=>"", "id"=>"keyword", "value"=>"$keyword"]);
							echo $this->Form->button("検索",["action"=>"index", 'id'=>'searchout1']);
							echo $this->Form->end();
						?>
					</div><!-- search -->
				</li>
			</ul>
		</div>
		
	</div>
	
</div>