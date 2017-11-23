<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 05.11.17
 * Time: 12:56
 */

namespace App\Form;


use App\Model\BU\UsersManager;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class RegisterForm extends Form
{
    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('lastname', 'string')
                ->addField('firstname' , 'string')
                ->addField('email', [ 'type' => 'email'])
                ->addField('password', ['type' => 'password'])
                ->addField('confirm_password', ['type' => 'password']);
    }

    protected function _buildValidator(Validator $validator)
    {
            return $validator->notEmpty(['lastname' , 'firstname', 'email', 'password', 'confirm_password'])
                ->add('password', [
                'compare' => [
                    'rule' => ['compareWith', 'confirm_password']
                ]
            ]);
    }

    protected function _execute(array $data)
    {
        if (!$this->validate($data))
            return false;

        return UsersManager::addNewUser($data);

    }
}