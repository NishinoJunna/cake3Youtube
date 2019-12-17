<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentsTable extends Table{
	public function initialize(array $config){
		parent::initialize($config);
		$this->table('comments');
		$this->displayfield('content');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Users',[
				'foreignKey'=>'user_id',
				'joinType'=>'inner'
		]);
	}

	public function validationDefault(Validator $validator){
		$validator
		->integer('id')
		->allowEmpty('id','create');
		$validator
		->requirePresence('youtube_id','create')
		->notEmpty('youtube_id');
		$validator
		->requirePresence('user_id','create')
		->notEmpty('user_id');
		$validator
		->requirePresence('content','create')
		->notEmpty('content');
		return $validator;
	}
}