<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 30.09.17
 * Time: 14:28
 */

namespace App\Controller;


use Cake\Event\Event;

class HomeController extends AppController
{
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['index']);
    }

    public function index(){
        $this->set('title', 'Home');
        $this->set('activeItem', 'home');
    }
}