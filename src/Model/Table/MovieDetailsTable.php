<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class MovieDetailsTable extends Table{
	public function initialize(array $config){
		parent::initialize($config);
		$this->table('movie_details');
		$this->displayfield('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->hasMany('Movies',[
				'foreignKey'=>'youtube_id',
				'bindingKey'=>'youtube_id',
				'joinType'=>'inner'
		]);
		
	}

	public function validationDefault(Validator $validator){
		$validator
		->integer('id')
		->allowEmpty('id','create');
		$validator
		->requirePresence('title','create')
		->notEmpty('title');
		$validator
		->requirePresence('youtube_id','create')
		->notEmpty('youtube_id');



		return $validator;
	}

	public function buildRules(RulesChecker $rules){
		$rules->add($rules->isUnique(['youtube_id'],
				["message"=>'この動画はすでに登録されています']));
		return $rules;
	}

}