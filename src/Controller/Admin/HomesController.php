<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use \Exception;

class HomesController extends AppController{
	public function index(){

		//検索前の表示画面
		$user = $this->MyAuth->user();
		$this->loadModel("Movies");
		$movie = $this->Movies->newEntity();
		$this->loadModel("MovieDetails");
		$trend_movies = $this->MovieDetails
		->find("all",array("order" => "rand()","limit" => 8));
		$this->loadModel("Playlists");
		$playlists = $this->Playlists->find('list')->where(["user_id"=>$user["id"]]);
		$this->paginate = ["limit"=>5,["contain"=>"Users"]];
		$trend_playlists = $this->paginate($this->Playlists->find("all")->contain("Users")->where(["status"=>1]));
		$comment = $this->loadModel('Comments');
		$this->set(compact('playlists',"movie",'comment',"trend_movies","trend_playlists"));
		// by 西野
	}
}
