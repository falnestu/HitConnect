<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 12.11.17
 * Time: 13:58
 */

namespace App\Model\BU;

use Cake\ORM\TableRegistry;

class UsersManager
{
    public static function addNewUser($data){
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->newEntity($data);
        return $usersTable->save($user);
    }
}