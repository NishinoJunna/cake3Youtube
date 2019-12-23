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
		$this->loadModel("Playlists");
		$this->paginate = ["limit"=>5,["contain"=>"Users"]];
		$trend_playlists = $this->paginate($this->Playlists->find("all")->contain("Users")->where(["status"=>1]));
		$this->set(compact("trend_movies","trend_playlists"));
		//by 西野
	}
	
	public function mylist($id = null){
		
	}
}