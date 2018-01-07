<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 05.01.18
 * Time: 17:20
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

class ConnectionMapperComponent extends Component
{
    public function ToSimpleConnections($result, $user_id){
        $connections = [];
        foreach($result as $connection){
            $user = ($connection->source_user->id === $user_id) ? $connection->target_user : $connection->source_user;
            $connections[] = [
                'id' => $connection->id,
                'since' => $connection->modified,
                'user' =>  [
                    'id' => $user->id,
                    'email' => $user->email,
                    'fullname' => $user->fullname
                ]
            ];
        }
        return $connections;
    }
}