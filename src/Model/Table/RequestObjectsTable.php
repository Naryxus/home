<?php
namespace App\Model\Table;

use App\Model\Entity\RequestObject;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequestObjects Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentRequestObjects
 * @property \Cake\ORM\Association\HasMany $ChildRequestObjects
 */
class RequestObjectsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('request_objects');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Tree');

        $this->belongsTo('ParentRequestObjects', [
            'className' => 'RequestObjects',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildRequestObjects', [
            'className' => 'RequestObjects',
            'foreignKey' => 'parent_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('lft')
            ->requirePresence('lft', 'create')
            ->notEmpty('lft');

        $validator
            ->integer('rght')
            ->requirePresence('rght', 'create')
            ->notEmpty('rght');

        $validator
            ->requirePresence('model', 'create')
            ->notEmpty('model');

        $validator
            ->integer('foreign_key')
            ->requirePresence('foreign_key', 'create')
            ->notEmpty('foreign_key');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['parent_id'], 'ParentRequestObjects'));
        return $rules;
    }
}
