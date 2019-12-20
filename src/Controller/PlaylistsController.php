<?php
namespace App\Controller;

use App\Controller\AppController;

class PlaylistsController extends AppController
{
	public function index()
	{
		//検索前の表示画面
		$this->loadModel("MovieDetails");
		$trend_movies = $this->MovieDetails
		->find("all",array("order" => "rand()","limit" => 8));
		$this->loadModel("Movies");
		//サブクエリ
		$subquery = $this->Movies->find()
		->select(['id'])
		->where(function ($exp, $q) {
			return $exp->equalFields('Playlists.id', 'Movies.playlist_id');
		});
		$this->loadModel("Playlists");
		$this->paginate = ["limit"=>5,["contain"=>"Users"]];
		$trend_playlists = $this->Playlists->find()->contain("Users")
		->where(function ($exp, $q) use ($subquery) {
			return $exp->exists($subquery);
		});
			//var_dump($trend_playlists);exit;
			$first = array();
			$tp = $trend_playlists->toArray();
			foreach($trend_playlists as $key => $t){
				$a = $this->Playlists->Movies->find("all")->where(["playlist_id"=>$tp[$key]->id])->toArray();
				if($a){
					$first[] = $a[0];
				}
			}
		
		$trend_playlists = $this->paginate($trend_playlists);
		$this->set(compact("trend_movies","trend_playlists","first"));
		//by 西野
	}

}