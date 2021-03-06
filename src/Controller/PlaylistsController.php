<?php
namespace App\Controller;

use App\Controller\AppController;
use Composer\Command\SearchCommand;

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
		$trend_playlists = $this->Playlists->find()->contain(["Users","Movies"])
		->where(function ($exp, $q) use ($subquery) {
			return $exp->exists($subquery);
		})
		->andWhere(["status"=>1]);
		//プレイリスト最初の動画IDをとる
		$first = array();
		$tp = $trend_playlists->toArray();
		foreach($trend_playlists as $key => $t){
			$a = $this->Playlists->Movies->find("all")->where(["playlist_id"=>$tp[$key]->id])->order(["play_number"=>"asc"])->toArray();
			if($a){
				$first[] = $a[0];
			}
		}
		
		$trend_playlists = $this->paginate($trend_playlists);
		$this->set(compact("trend_movies","trend_playlists","first"));
		
		$search = "";
		$keyword = "";
		if(isset($_GET["keyword"])){
			if($_GET["keyword"] == ""){
				return $this->redirect(["action"=>"index"]);
			}
			$keyword = $_GET["keyword"];
		}
		
		$this->set(compact('search','keyword'));
	}

	public function play()
	{
		$search = "";
		$keyword = "";
		$comment = $this->loadModel('Comments');
		if(isset($_GET["youtube_id"])){
			$youtube_id = $_GET["youtube_id"];
		}
		if(isset($_GET["search"])){
			$search = $_GET["search"];
		}
		if($youtube_id == null || $youtube_id == ""){
			return $this->redirect(['action' => 'index']);
		}
		$comments = $this->loadModel('Comments')
		->find('all',['order' =>['Comments.created_at' => 'DESC'] ])
		->contain('Users')
		->where(['youtube_id'=>$youtube_id]);
		//var_dump($comments); die();
		$this->set(compact('comment','comments','search',"keyword"));
	}
	public function playlist()
	{
		$keyword="";
		$search = "";
		$playlist_id = null;
		$youtube_id = "";
		$comment = $this->loadModel('Comments');
		$movie = "";
		$playlists = "";
		$nb = "";
		if(isset($_GET["playlist_id"]) && isset($_GET["youtube_id"]) ){
			$playlist_id = $_GET["playlist_id"];
			$youtube_id = $_GET["youtube_id"];
			
		}
		$playlist_movies= $this->loadModel('Movies')
					->find("all")
					->contain('MovieDetails')
					->where(["playlist_id"=>$playlist_id])
					->order(["play_number"=>"ASC"])
					->toArray();
		$nb = count($playlist_movies);
		//var_dump($nb); die();
		
		if($playlist_id == "" || $playlist_id == null || $youtube_id == null || $youtube_id == ""){
			return $this->redirect(['action' => 'index']);
		}
		$search = "";
		$comments = $this->loadModel('Comments')
		->find('all',['order' =>['Comments.created_at' => 'DESC'] ])
		->contain('Users')
		->where(['youtube_id'=>$youtube_id]);
		$this->set(compact("playlist_movies","playlist_id","nb","comments","comment","search","keyword"));
	}
	
	public function view($playlist_id){
		$search = "";
		$keyword = "";
		// アクセスログ生成
		$this->loadComponent('Math');
		$this->Math->accesslog("ViewPlaylists");
		try{

			$playlist = $this->Playlists->get($playlist_id);
			//非公開のものは表示できない
			if($playlist["status"] !== 1){
				throw new Exception();
			}
			$this->loadModel("Movies");
			$movies= $this->Movies
			->find("all")
			->contain('MovieDetails')
			->where(["playlist_id"=>$playlist_id])
			->order(["play_number"=>"ASC"])
			->toArray();
			$movi=$this->Movies
			->find("all")
			->contain('MovieDetails')
			->where(["playlist_id"=>$playlist_id])
			->order(["play_number"=>"ASC"])
			->first();
			$this->set(compact("movies","playlist_id","movi","mine","playlist","search","keyword"));
		}catch(Exception $e){
			$this->Flash->error(__("不正なIDです"));
			return $this->redirect(["controller"=>"homes"]);
		}
	
	
	}
}













