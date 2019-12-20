<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use \Exception;

class HomesController extends AppController{
	public function index(){
		$comment = $this->loadModel('Comments');
		$this->set(compact('comment'));
	}
	
	public function play($id = null){
		$comment = $this->loadModel('Comments');
		if(isset($_GET["youtube_id"])){
			$youtube_id = $_GET["youtube_id"];
		}
		$comments = $this->loadModel('Comments')
					->find('all',['order' =>['Comments.created_at' => 'DESC'] ])
					->contain('Users')
					->where(['youtube_id'=>$youtube_id]);
		//var_dump($comments); die();
		$this->set(compact('comment','comments'));
	}
}
