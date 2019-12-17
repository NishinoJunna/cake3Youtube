<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Auth\Cake\Auth;

class Movie extends Entity{
	protected $_accessible=[
			'*'=>true,
			'id'=>false
	];
}