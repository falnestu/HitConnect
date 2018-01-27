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
    public static function add($data){
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->newEntity($data);
        return $usersTable->save($user);
    }

    public static function getUsernameById($user_id){
        return TableRegistry::get('Users')->get($user_id)->Fullname;
    }
}