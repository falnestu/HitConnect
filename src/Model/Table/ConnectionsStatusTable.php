<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ConnectionsStatus Model
 *
 * @property \App\Model\Table\ConnectionsTable|\Cake\ORM\Association\HasMany $Connections
 *
 * @method \App\Model\Entity\ConnectionsStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\ConnectionsStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ConnectionsStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ConnectionsStatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConnectionsStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ConnectionsStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ConnectionsStatus findOrCreate($search, callable $callback = null, $options = [])
 */
class ConnectionsStatusTable extends Table
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

        $this->setTable('connections_status');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Connections', [
            'foreignKey' => 'connections_status_id'
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
            ->scalar('label')
            ->requirePresence('label', 'create')
            ->notEmpty('label');

        return $validator;
    }
}
