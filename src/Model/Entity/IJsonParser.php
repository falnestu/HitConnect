<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 16.12.17
 * Time: 17:57
 */

namespace App\Model\Entity;


interface IJsonParser
{
    public static function ToEntity($json);
}