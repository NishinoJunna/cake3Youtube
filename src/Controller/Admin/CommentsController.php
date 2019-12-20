<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use \Exception;


class CommentsController extends AppController
{
	function index($youtube_id = null){
		$user = $this->MyAuth->user();
		$comment = $this->Comments->newEntity();
		$this->set(compact("comment","youtube_id"));
		try{
			$comments = $this->Comments->find("all")
										->contain(["Users"])
										->where(["youtube_id"=>$youtube_id])
										->order(["Comments.created_at"=>"desc"]);
			$this->set(compact("comments"));
		}catch(Exception $e){
			
		}
		if ($this->request->is("post")){
			$comment->youtube_id = $this->request->data["youtube_id"];
			$comment->content = $this->request->data["content"];
			$comment->user_id = $user["id"];
			if($this->Comments->save($comment)){
				return $this->redirect(["action"=>"index",$youtube_id = 2]);
			}
			$this->Flash->error(__('コメントに失敗しました'));		
		}
	}
	
	public function addcommentajax(){
		$this->autoRender = false;
		$result = [];
		
		$user=$this->MyAuth->user();
		$user_id = $user['id'];
		
		$comment = $this->Comments->newEntity();
		
		if($this->request->is(['ajax'])){
			$comment->content = $this->request->data['content'];
			$comment->user_id = $user_id;
			$comment->youtube_id = $this->request->data['youtube_id'];
			if($this->Comments->save($comment)){
				$comments = $this->Comments->find('all')
								->contain("Users")
								->where(['youtube_id'=>$comment->youtube_id])
								->order(['Comments.created_at' => 'DESC']);
				$result['status']="success";
				foreach ($comments as $com)
				{
					$result["user_name"][] = $com->user->name;
					$result["content"][] = $com->content;
					$result["created_at"][] = h($com->created_at->format("Y年m月d日H時i分"));
					
				}
				echo json_encode($result);
				return;
			}else{
				$result['errors']=$comments->errors();
				return;
			}
		
		$result['status']=$this->MyAuth->user['id'];
		echo json_encode($result);
		return;
		
		}
	}
}



















