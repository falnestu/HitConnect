<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 01.11.17
 * Time: 17:41
 */

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence(['firstname', 'lastname', 'email', 'password']);

        return $validator;
    }
}