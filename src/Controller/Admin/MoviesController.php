<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use \Exception;

class MoviesController extends AppController
{
	public function addplaylistajax(){
		$this->autoRender = false;
		$result= [];
		
		$movie = $this->Movies->newEntity();
		if($this->request->is('ajax')){
			$movie->playlist_id = $this->request->data["playlist_id"];
			$movie->youtube_id = $this->request->data["youtube_id"];
			if($this->Movies->save($movie)){
				$this->loadModel("MovieDetails");
				$movie_detail = $this->MovieDetails->newEntity();
				$youtube_id = $movie->youtube_id;
				$already_exist = $this->MovieDetails->find('all')->where(["youtube_id"=>$youtube_id])->toArray();
				if(empty($already_exist)){
					$movie_detail->youtube_id = $youtube_id; 
					$movie_detail->title = $this->request->data["title"];
					if($this->MovieDetails->save($movie_detail)){
						$result['status']="success";
						echo json_encode($result);
						return;
					}
				}
			}
			$result["status"]=$movie_detail->errors();
			echo json_encode($result);
			return;
		}
	}
	//https://img.youtube.com/vi/{youtube_video_id}/default.jpg これが準備されているyoutubeサムネイル
	
	public function delete($id = null){
		$user_id = $this->MyAuth->user("id");
		try{
			$movie = $this->Movies->get($id);
			$playlist = $this->Movies->Playlists->get($movie["playlist_id"]);
			if($playlist["user_id"] != $user_id){
				throw new Exception();
			}else{
				$this->request->is(['post','delete']);
				if($this->Movies->delete($movie)){
					$this->Flash->success(__('プレイリストから削除しました'));
				}else{
					$this->Flash->error(__('削除に失敗しました'));
				}
				return $this->redirect(["controller"=>"playlists","action"=>"mylist"]);
			}
		}catch(Exception $e){	
			$this->Flash->error(__("不正なIDです"));
			return $this->redirect(["controller"=>"playlists","action"=>"mylist"]);
		}
		
	}
	public function edit($playlist_id=null){
		$playlist_movies= $this->Movies->find('all')
			->contain('MovieDetails')
			->where(['Movies.playlist_id'=>$playlist_id])
			->order(['Movies.play_number'=>'ASC']);
		
		if($this->request->is("post")){
			$number= $this->request->data;
			foreach($number as $key => $value){
				$play_number= ['play_number'=>$key];
				$video_id = ['youtube_id'=>$value];
				$this->Movies->updateAll($play_number,$video_id);
			}
			return $this->redirect(["action"=>"view",$playlist_id]);
		}
		$this->set(compact('playlist_movies'));
	}
	
	public function view($playlist_id){
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
			
		$this->set(compact("movies","playlist_id","movi"));
	}
}