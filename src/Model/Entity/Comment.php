<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Auth\Cake\Auth;

class Comment extends Entity{
	protected $_accessible=[
			'*'=>true,
			'id'=>false
	];
}