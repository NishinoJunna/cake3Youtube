<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use \Exception;

class HomesController extends AppController{
	public function index(){
		
		$keyword = "";
		if(isset($_GET["keyword"])){
			if($_GET["keyword"] == ""){
				return $this->redirect(["action"=>"index"]);
			}
			$keyword = $_GET["keyword"];
		}
		// アクセスログ生成
		$this->loadComponent('Math');
		$this->Math->accesslog("Home");
		//検索前の表示画面
		$this->loadModel("Movies");
		//サブクエリ
		$subquery = $this->Movies->find()
		->select(['id'])
		->where(function ($exp, $q) {
			return $exp->equalFields('Playlists.id', 'Movies.playlist_id');
		});
		$trend_movies = $this->Movies
		->find("all",array("order" => "rand()","limit" => 8))
		->contain(["Playlists","MovieDetails"])
		->where(["Playlists.status"=>"1"])->toArray();
			
			
		/*	修正しました。
		 * $this->loadModel("MovieDetails");
		$trend_movies = $this->MovieDetails
		->find("all",array("order" => "rand()","limit" => 8));*/
		$this->loadModel("Playlists");
		
		$this->paginate = ["limit"=>5,["contain"=>"Users"]];
		
		$trend_playlists = $this->Playlists->find()->contain(["Users","Movies"])
		->where(function ($exp, $q) use ($subquery) {
			return $exp->exists($subquery);
		})
		->andWhere(["status"=>1]);
		//プレイリスト最初の動画IDをとる
		$first = array();
		$tp = $trend_playlists->toArray();
		foreach($trend_playlists as $key => $t){
			$a = $this->Playlists->Movies->find("all")->where(["playlist_id"=>$tp[$key]->id])->order(["play_number"=>"Asc"])->toArray();
			if($a){
				$first[] = $a[0];
			}
		}
		
		$trend_playlists = $this->paginate($trend_playlists);
		$comment = $this->loadModel('Comments');
		$this->set(compact('comment',"trend_movies","trend_playlists","first","count"));
		

		$search = 0;
		
		$this->set(compact('comment','search',"keyword"));


	}
	
	public function play(){
		// アクセスログ生成
		$keyword = "";
		$this->loadComponent('Math');
		$this->Math->accesslog("Play");
		
		$search = "";
		$comment = $this->loadModel('Comments');
		if(isset($_GET["youtube_id"])){
			$youtube_id = $_GET["youtube_id"];
		}
		if(isset($_GET["search"])){
			$search = $_GET["search"];
		}
		$comments = $this->loadModel('Comments')
					->find('all',['order' =>['Comments.created_at' => 'DESC'] ])
					->contain('Users')
					->where(['youtube_id'=>$youtube_id]);
		//var_dump($comments); die();
		$user = $this->MyAuth->user();
		$this->loadModel("Playlists");
		$playlists = $this->Playlists->find('list')->where(["user_id"=>$user["id"]]);
		$this->loadModel("Movies");
		$movie = $this->Movies->newEntity();
		$this->set(compact('comment','comments','playlists','movie','search',"keyword"));

	}
}
