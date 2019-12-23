<?php
namespace App\Controller\Component;

use Cake\Controller\Component;


class MathComponent extends Component{

	public function accesslog($page = null){
		$filename = sprintf("./a_%s_log.txt",date("Ymd")); //ログファイル名
		$time = date("Y/m/d H:i"); //アクセス時刻
		$ip = getenv("REMOTE_ADDR"); //IPアドレス
		$host = getenv("REMOTE_HOST"); //ホスト名
		$referer = getenv("HTTP_REFERER"); //リファラ
		
		if($referer == "") {
			$referer = "refererなし";
		}
		
		//ログ本文
		$log = $page .":". $time .",". $ip . ",". $host. ",". $referer."\n";
		
		//ログ書き込み
		$fp = fopen($filename, "a");
		fputs($fp, $log."n");
		fclose($fp);
		
	}
	
	public function dbaccesslog(){
		
	}
}