<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 03.01.18
 * Time: 11:22
 */

namespace App\Model\BU;


use App\Model\Table\ConnectionsTable;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

class ConnectionsManager
{
    private static function getConnectedUsersId($user_id){
        $connectionsTable = TableRegistry::get('Connections');
        $sourceConnection = $connectionsTable->find()->where(['source_users_id' => $user_id])->extract('target_users_id');
        $targetConnection = $connectionsTable->find()->where(['target_users_id' => $user_id])->extract('source_users_id');

        $existingConnections = array();
        foreach($sourceConnection as $target_user_id) $existingConnections[] = $target_user_id;
        foreach($targetConnection as $source_users_id) $existingConnections[] = $source_users_id;

        return $existingConnections;
    }

    private static function create($source_user_id, $target_user_id, $connectionStatus){
        $connectionsTable = TableRegistry::get('Connections');
        $connection = $connectionsTable->newEntity([
            'source_users_id' => $source_user_id,
            'target_users_id' => $target_user_id,
            'connections_status_id' => $connectionStatus
        ]);
        return $connectionsTable->save($connection);
    }

    public static function updateStatus($connection_id, $status){
        $connectionsTable = TableRegistry::get('Connections');
        $connection = $connectionsTable->get($connection_id);
        $connectionsTable->patchEntity($connection, [
            'connections_status_id' => $status
        ]);
        return $connectionsTable->save($connection);
    }

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

    public static function getMatchesByUserId($user_id){

        $connectedUsers = self::getConnectedUsersId($user_id);
        $matchingManager = new MatchingManager($user_id, $connectedUsers);
        return $matchingManager->getMatches();

    }

    public static function addInvitations($source_user_id, $target_user_id){
        return self::create($source_user_id, $target_user_id, ConnectionsTable::STATUS_PENDING);
    }
}