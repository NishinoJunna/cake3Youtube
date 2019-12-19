<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use \Exception;

class HomesController extends AppController{
	public function index(){

		//プレイリストに動画を登録するときのinput、オプション用
		$user = $this->MyAuth->user();
		$this->loadModel("Movies");
		$movie = $this->Movies->newEntity();
		$this->loadModel("Playlists");
		$playlists = $this->Playlists->find('list')->where(["user_id"=>$user["id"]]);
		$comment = $this->loadModel('Comments');
		$this->set(compact('playlists',"movie",'comment'));

	}
}
