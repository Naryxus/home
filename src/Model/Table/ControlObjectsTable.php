<?php
namespace App\Model\Table;

use App\Model\Entity\ControlObject;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * Created by PhpStorm.
 * User: Naryxus
 * Date: 18.05.2016
 * Time: 00:37
 * 
 * Users Model
 */
class ControlObjectsTable extends Table {
	
	public function initialize(array $config) {
		parent::initialize($config);
		
		$this->table('control_objects');
		$this->displayField('id');
		$this->primaryKey('id');
	}
	
	public function validationDefault(Validator $validator) {
		$validator
			->integer('id')
			->allowEmpty('id', 'create');
		
		$validator
			->requirePresence('lft', 'true')
			->integer('lft')
			->allowEmpty('lft', 'false');

		$validator
			->requirePresence('rgt', 'true')
			->integer('rgt')
			->allowEmpty('rgt', 'false');

		$validator
			->requirePresence('key', 'true')
			->allowEmpty('key', 'false');
	}

	public function buildRules(RulesChecker $rules) {
		return $rules;
	}
}