<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentsTable extends Table{
	public function initialize(array $config){
		parent::initialize($config);
		$this->table('movies');
		$this->displayfield('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Playlists',[
				'foreignKey'=>'playlist_id',
				'joinType'=>'inner'
		]);
	}

	public function validationDefault(Validator $validator){
		$validator
		->integer('id')
		->allowEmpty('id','create');
		$validator
		->requirePresence('playlist_id','create')
		->notEmpty('playlist_id');
		$validator
		->requirePresence('youtube_id','create')
		->notEmpty('youtube_id');
		return $validator;
	}
}