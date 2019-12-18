<?php
namespace App\Controller;

use App\Controller\AppController;

class PlaylistsController extends AppController
{
	public function index()
	{
		if(!empty($_POST['item'])){
			$item = $_POST['item'];
			print $item;
				
		}
	}
	
	public function mylist(){
		
	}

}