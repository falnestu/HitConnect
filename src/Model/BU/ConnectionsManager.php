<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 03.01.18
 * Time: 11:22
 */

namespace App\Model\BU;


use Cake\ORM\TableRegistry;

class ConnectionsManager
{
    public static function getActiveConnectionsByUserId($user_id){
        $connectionsTable = TableRegistry::get('Connections');

        $filterQueryUser = function($q) use ($user_id){
            return $q->select(['id', 'firstname', 'lastname', 'email'])
               // ->where(['id IS NOT' => $user_id ])
                ;
        };

        $result = $connectionsTable->find('accepted')
            ->where(['OR' => [
                        ['source_users_id' => $user_id],
                        ['target_users_id' => $user_id]
            ]])
            ->contain('Source', $filterQueryUser)
            ->contain('Target', $filterQueryUser)
            ->select(['id', 'modified'])
            ->toArray();

        return $result;

    }

    public static function getInvitationsByUserId($user_id){
        $connectionsTable = TableRegistry::get('Connections');
        $query = $connectionsTable->find('pending')->where(['target_users_id' => $user_id])->contain('Source');
        return $query->toArray();
    }
}