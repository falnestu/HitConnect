<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Connection Entity
 *
 * @property int $id
 * @property int $source_users_id
 * @property int $target_users_id
 * @property int $connections_status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ConnectionsStatus $connections_status
 */
class Connection extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id' => true,
        'source_users_id' => true,
        'target_users_id' => true,
        'connections_status_id' => true,
        'created' => true,
        'modified' => true,
        'source_user' => true,
        'target_user' => true,
        'connections_status' => true
    ];


    protected function _getFormatModified(){
        if($this->_properties['modified'])
            return $this->_properties['modified']->format('d/m/Y');
        return $this->_properties['modified'];
    }

}
