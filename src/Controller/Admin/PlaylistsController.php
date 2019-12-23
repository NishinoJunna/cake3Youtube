<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;


class PlaylistsController extends AppController
{
	function mylist()
	{
		$user =$this->MyAuth->user();
		
		$my_playlists= $this->Playlists
			->find('all')
			->contain('Movies')
			->where(['Playlists.user_id'=>$user['id']]);
		
		$this->set(compact('user','my_playlists'));
	}

	function add()
	{
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
		$playlist = $this->Playlists->get($id, [
				'contain'	=> []
		]);
		if($this->request->is(['patch', 'post', 'put'])){
			$playlist = $this->Playlists->patchEntity($playlist, $this->request->data);
			if($this->Playlists->save($playlist)){
				$this->Flash->success(__('プレイリストを更新しました'));
				return $this->redirect(['action' => 'mylist']);
			}
			$this->Flash->error(__('プレイリストの更新に失敗しました'));
		}
		$this->set(compact('playlist'));
	}
	
	public function play($playlist_id){
		$playlist_movies = $this->Playlists->Movies
			->find("all")
			->contain("MovieDetails")
			->where(["playlist_id"=>$playlist_id])
			->order(["play_number"=>"ASC"])
			->toArray();
		$this->set(compact("playlist_movies"));
	}
}

