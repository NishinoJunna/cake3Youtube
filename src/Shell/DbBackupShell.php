<?php
namespace App\Shell;

use Cake\Console\Shell;

class DbBackupShell extends Shell
{

	public function main(){
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
		/*毎日この処理を実行する方法
		 * windowsでタスクスケジューラを開く。
		 * 基本タスクの作成→名前、説明適当に。→トリガーを「毎日」に設定→
		 * 操作の間隔「1日」→操作「プログラムの開始」→
		 * プログラム/スクリプト「C:\WINDOWS\system32\cmd.exe」　引数の追加「/c C:\xampp\htdocs\cake3youtube\bin\cake dbbackup」
		 */
	}


}