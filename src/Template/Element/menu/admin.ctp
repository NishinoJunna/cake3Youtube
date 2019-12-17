<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
		<?=$this->Html->link("title",["controller"=>"Homes"],["class"=>"navbar-brand"]); ?>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<?=$this->Html->link("マイプレイリスト","/admin/playlists/mylist"); ?>
				</li>
				<li class="dropdown">
					<?=$this->Html->link("プレイリスト新規作成","#",["data-toggle"=>"dropdown"]); ?>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<p class="navbar-text">ようこそ、<?=$auth["name"]; ?>さん</p>
				<li class="dropdown">
					<?=$this->Html->link("管理","#",["data-toggle"=>"dropdown"]); ?>
					<ul class="dropdown-menu">
						<li><?=$this->Html->link("ユーザ編集","/admin/users/edit") ?></li>
						<li><?=$this->Html->link("ログアウト","/admin/users/logout") ?></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>