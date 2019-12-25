<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use \Exception;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;


class ManagementController extends AppController
{
	function csvdownload($id = null){
		
		// アクセスログ生成
		$this->loadComponent('Math');
		$this->Math->accesslog("csvDownload");
		
		$user = $this->MyAuth->user();
		$this->autoRender = false;
		/*if($user !== "管理者"){
			return $this->redirect(["controller"=>"Homes"]);
		}else{ */
		if($id == "users"||$id == "playlists"||$id == "movies"||$id == "comments"){
			Configure::write("debug", 0); // debugコードを出さないように
			$csv_file = sprintf($id."_%s.csv", date("Ymd-hi")); // 日付でファイル名を指定
			header ("Content-disposition: attachment; filename=" . $csv_file);
			header ("Content-type: application/octet-stream; name=" . $csv_file);
			$buf = null;
			if($id === "users"){
				$this->loadModel("Users");
				$users = $this->Users->find("all")->toArray();
				foreach($users as $u){
					$buf .= '"' . $u["id"] . '","' . $u["email"] . '", "' . $u["name"] . '","' . $u["created_at"] . '","' . $u["modified_at"] . '"' . "\n";
				}
			}else if($id === "playlists"){
				$this->loadModel("Playlists");
				$playlists = $this->Playlists->find('all')->toArray();
				foreach($playlists as $p){
					$buf .= '"' . $p["id"] . '","' . $p["user_id"] 
							. '", "' . $p["name"] . '", "' . $p["status"] . '","' . '", "' . $p["description"]
							. $value["created_at"] . '","' . $value["modified_at"] . '"' . "\n";
				}
			}else if($id === "movies"){
				$this->loadModel("Movies");
				$movies = $this->Movies->find("all")->toArray();
				foreach($movies as $m){
					$buf .= '"' . $m["id"] . '","' . $m["playlist_id"] . '", "' . $m["youtube_id"] . '","' . $m["created_at"] . "\n";
				}
				
			}else if($id === "comments"){
				$this->loadModel("Comments");
				$comments = $this->Comments->find("all")->toArray();
				foreach($comments as $c){
					$buf .= '"' . $c["id"] . '","' . $c["youtube_id"] . '", "' . $c["user_id"] . '", "' . $c["content"].  '","' . $c["created_at"] . "\n";
				}
			}
		}else{
			return;
		}
			//$buf = "あいうえお。ダウンロードテスト";
			// 注意点は二つ。
			// 1. 一つにまとめたい文字列は""で囲む。
			// 2. 文字列内に"がある場合は""としてエスケープ
			print($buf); // 出力
			return;
		/*}*/
	}
	

}