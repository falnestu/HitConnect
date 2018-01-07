<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Connections Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $SourceUser
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $TargetUser
 * @property \App\Model\Table\ConnectionsStatusTable|\Cake\ORM\Association\BelongsTo $ConnectionsStatus
 *
 * @method \App\Model\Entity\Connection get($primaryKey, $options = [])
 * @method \App\Model\Entity\Connection newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Connection[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Connection|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Connection patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Connection[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Connection findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ConnectionsTable extends Table
{
    const STATUS_PENDING = 1;
    const STATUS_ACCEPTED = 2;
    const STATUS_REFUSED = 3;
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('connections');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Source', [
            'className' => 'Users',
            'foreignKey' => 'source_users_id',
            'joinType' => 'INNER',
            'propertyName' => 'source_user'
        ]);
        $this->belongsTo('Target', [
            'className' => 'Users',
            'foreignKey' => 'target_users_id',
            'joinType' => 'INNER',
            'propertyName' => 'target_user'
        ]);
        $this->belongsTo('ConnectionsStatus', [
            'foreignKey' => 'connections_status_id',
            'joinType' => 'INNER'
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
            ->requirePresence('id', 'create')
            ->notEmpty('id');

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
        $rules->add($rules->existsIn(['source_users_id'], 'Users'));
        $rules->add($rules->existsIn(['target_users_id'], 'Users'));
        $rules->add($rules->existsIn(['connections_status_id'], 'ConnectionsStatus'));

        return $rules;
    }

    public function findAccepted(Query $query, array $options){
        return $this->queryWithStatus($query, self::STATUS_ACCEPTED);
    }

    public function findPending(Query $query, array $options){
        return $this->queryWithStatus($query, self::STATUS_PENDING);
    }

    private function queryWithStatus(Query $query, $status){
        return $query->where(['connections_status_id' => $status]);
    }

}
