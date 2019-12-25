<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use \Exception;	

class PlaylistsController extends AppController
{
	function mylist()
	{	
		// アクセスログ生成
		$this->loadComponent('Math');
		$this->Math->accesslog("Mylist");
		
		$user =$this->MyAuth->user();
		
		$my_playlists= $this->Playlists
			->find('all')
			->contain('Movies')
			->where(['Playlists.user_id'=>$user['id']]);
		
		$this->set(compact('user','my_playlists'));
	}

	function add()
	{	
		// アクセスログ生成
		$this->loadComponent('Math');
		$this->Math->accesslog("addPlaylist");
		
		$username = $this->MyAuth->user();
		$playlist = $this->Playlists->newEntity();
		if ($this->request->is('post')){
			$playlist = $this->Playlists->patchEntity($playlist, $this->request->data);
			$playlist->user_id = $username["id"];
			//var_dump($playlist->toArray()); die();
			if($this->Playlists->save($playlist)){
				$this->Flash->success(__('プレイリストを新規登録しました'));
				return $this->redirect(['action' => 'mylist']);
			}
			$this->Flash->error(__('プレイリストの新規登録に失敗しました'));
		}
		$this->set(compact('playlist'));
	}
	function edit($id = null)
	{
		// アクセスログ生成
		$this->loadComponent('Math');
		$this->Math->accesslog("EditPlaylist");
		$user_id = $this->MyAuth->user("id");
		try{
			$playlist = $this->Playlists->get($id, [
				'contain'	=> ["Users"]
			]);
			if($playlist["user_id"] !== $user_id){
				throw new Exception();
			}
			if($this->request->is(['patch', 'post', 'put'])){
				$playlist = $this->Playlists->patchEntity($playlist, $this->request->data);
				if($this->Playlists->save($playlist)){
					$this->Flash->success(__('プレイリストを更新しました'));
					return $this->redirect(['action' => 'mylist']);
				}
				$this->Flash->error(__('プレイリストの更新に失敗しました'));
			}
			$this->set(compact('playlist'));
		}catch(Exception $e){
			$this->Flash->error(__("不正なIDです"));
			return $this->redirect(["action"=>"mylist"]);
		}
	}
	
	public function play($playlist_id = null){
		// アクセスログ生成
		$this->loadComponent('Math');
		$this->Math->accesslog("Play");
		//追加
		$user = $this->MyAuth->user();
		$playlists = $this->Playlists->find('list')->where(["user_id"=>$user["id"]]);
		$this->loadModel("Movies");
		$movie = $this->Movies->newEntity();
		//by 西野
		$youtube_id = "";
		$comment = $this->loadModel('Comments');
		$nb = "";
		if(isset($_GET["playlist_id"]) && isset($_GET["youtube_id"]) ){
			$playlist_id = $_GET["playlist_id"];
			$youtube_id = $_GET["youtube_id"];
			$nb = $_GET["nb"];
		}
		$search = "";
		$comments = $this->loadModel('Comments')
			->find('all',['order' =>['Comments.created_at' => 'DESC'] ])
			->contain('Users')
			->where(['youtube_id'=>$youtube_id]);
		$playlist_movies = $this->Playlists->Movies
			->find("all")
			->contain("MovieDetails")
			->where(["playlist_id"=>$playlist_id])
			->order(["play_number"=>"ASC"])
			->toArray();
		$this->set(compact("playlist_movies","search","comments","comment","movie","playlists","playlist_id","nb"));
	}
	
	public function delete($id = null){
		// アクセスログ生成
		$this->loadComponent('Math');
		$this->Math->accesslog("DeletePlaylist");
		
		$user_id = $this->MyAuth->user("id");
		try{
			$playlist = $this->Playlists->get($id, [
				"contain"=>["Users","Movies"]	
			]);
			if($playlist["user_id"] != $user_id){
				throw new Exception();
			}else{
				$this->request->is(['post','delete']);
				if($this->Playlists->delete($playlist)){
					$this->Flash->success(__('プレイリストを削除しました'));
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

