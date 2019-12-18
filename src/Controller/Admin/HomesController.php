<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use \Exception;

class HomesController extends AppController{
	public function index(){
		$this->loadModel("Movies");
		$movie = $this->Movies->newEntity();
		$this->loadModel("Playlists");
		$playlists = $this->Playlists->find('list');
		$this->set(compact('playlists',"movie"));
	}
}
