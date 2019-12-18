<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use \Exception;


class MoviesController extends AppController
{
	public function add(){
		$movie = $this->Movies->newEntity();
		if($this->request->is('post')){
			$movie = $this->Movies->patchEntity($movie,$this->request->data);
			if($this->Movies->save($movie)){
				
				return $this->redirect(["controller"=>"playlists","action"=>"mylist"]);
			}
			$this->Flash->error(__('動画の登録に失敗しました'));
		}
		return $this->redirect(["controller"=>"playlists","action"=>"mylist"]);
	}
	
	public function delete($id = null){
		try{
			$movie = $this->Movies->get($id);
			$this->request->is(['post','delete']);
			if($this->Movies->delete($movie)){
				$this->Flash->success(__('プレイリストから削除しました'));
			}else{
				$this->Flash->error(__('削除に失敗しました'));
			}
			return $this->redirect(["controller"=>"playlists","action"=>"mylist"]);
		}catch(Exception $e){	
			
		}
	}
	
}