<?php
namespace App\Controller;

use App\Controller\AppController;
use \Exception;


class ManagementController extends AppController
{

	public function backup(){
		$this->autoRender = false;
		//DB情報
		$id = "root";
		$pwd = "";
		$db = "cake3youtube";
	
		//出力ファイル名
		$fileName = 'C:/xampp/htdocs/cake3Youtube/webroot/backup/db_dump.dump';
		//mysqldump --single-transaction -u root -p cake3youtube > mydumpfile.dump
		//コマンド生成
		$cmd = 'mysqldump --single-transaction';
		$cmd = $cmd . ' -u ' . $id;
		$cmd = $cmd . ' --password=';
		$cmd = $cmd . ' ' . $db;
		$cmd = $cmd . ' > ' . $fileName;
	
		//実行
		system($cmd);
		//var_dump($cmd);exit();
	}


}