<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use \Exception;


class MoviesController extends AppController
{
	public function add(){
		//https://img.youtube.com/vi/{youtube_video_id}/default.jpg これが準備されているyoutubeサムネイル
		$movie = $this->Movies->newEntity();
		if($this->request->is('post')){
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
						return $this->redirect(["controller"=>"playlists","action"=>"mylist"]);
					}
					$this->Flash->error(__('動画の登録に失敗しました。'));
				}
				return $this->redirect(["controller"=>"playlists","action"=>"mylist"]);
			}
			$this->Flash->error(__('動画の登録に失敗しました。既に登録されている可能性があります。'));
		}
		return $this->redirect(["controller"=>"playlists","action"=>"mylist"]);
	}
	
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
	
}