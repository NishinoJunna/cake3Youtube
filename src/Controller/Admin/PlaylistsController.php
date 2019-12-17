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
		$playlist = $this->Playlists->newEntity();
		if ($this->request->is('post')){
			$playlist = $this->Playlists->patchEntity($playlist, $this->request->data);
			if($this->Playlists->save($playlistt)){
				$this->Flash->success(__('プレイリストを新規登録しました'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('プレイリストの新規登録に失敗しました'));
		}
		$this->set(compact('playlist'));
	}
}