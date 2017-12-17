<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Recordings Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Artists
 * @property |\Cake\ORM\Association\HasMany $UsersPreferredTitles
 *
 * @method \App\Model\Entity\Recording get($primaryKey, $options = [])
 * @method \App\Model\Entity\Recording newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Recording[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Recording|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Recording patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Recording[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Recording findOrCreate($search, callable $callback = null, $options = [])
 */
class RecordingsTable extends Table
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

        $this->setTable('recordings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Artists', [
            'foreignKey' => 'artist_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('UsersPreferredTitles', [
            'foreignKey' => 'recording_id'
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
            ->scalar('id_musicbrainz')
            ->requirePresence('id_musicbrainz', 'create')
            ->notEmpty('id_musicbrainz');

        $validator
            ->scalar('label')
            ->requirePresence('label', 'create')
            ->notEmpty('label');

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
        $rules->add($rules->existsIn(['artist_id'], 'Artists'));

        return $rules;
    }
}
