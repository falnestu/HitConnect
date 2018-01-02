<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 02.01.18
 * Time: 14:16
 */

namespace App\Model\BU;


use Cake\ORM\TableRegistry;

class BaseManager
{
    protected static function getEntityName(){
        list(, $className) = namespaceSplit(get_called_class());
        $entityName = substr($className,0, -7);
        return $entityName;
    }

    public static function findOrCreate($data){
        $table = TableRegistry::get(self::getEntityName());
        $entity = $table->findOrCreate($data);
        return $entity;
    }
}