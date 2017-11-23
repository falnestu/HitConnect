<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 08.10.17
 * Time: 17:19
 */

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{
    //<editor-fold desc="Properties">
    public function getFullName(){
        return $this->_properties['firstname'] . $this->_properties['lastname'];
    }

    protected function _setPassword($password){
        if (strlen($password) > 0){
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
    //</editor-fold>

}