<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PlaylistsTable extends Table{
	public function initialize(array $config){
		parent::initialize($config);
		$this->table('playlists');
		$this->displayfield('name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');
		
		$this->belongsTo('Users',[
				'foreignKey'=>'user_id',
				'joinType'=>'inner'
		]);
		$this->hasMany('Movies',[
				'foreignKey'=>'playlist_id',
				'joinType'=>'inner'
		]);
	}

	public function validationDefault(Validator $validator){
		$validator
		->integer('id')
		->allowEmpty('id','create');
		$validator
		->requirePresence('name','create')
		->notEmpty('name');
		$validator
		->requirePresence('status','create')
		->notEmpty('status');
		$validator
		->requirePresence('description','create')
		->notEmpty('description');
		$validator
		->requirePresence('user_id','create')
		->notEmpty('user_id');
		return $validator;
	}
}