<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;


class PlaylistsController extends AppController
{
	function mylist()
	{

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
}

