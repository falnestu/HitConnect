<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 30.09.17
 * Time: 14:18
 */

namespace App\Controller;


use App\Model\Entity\User;
use Cake\Event\Event;

class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login']);
    }

    public function login(){
        if($this->request->is('post')){
            //$user = $this->Auth->identify(); //si on a une DB

            //si pas de DB
            $username = $this->request->getData('username');
            $password = $this->request->getData('password');

            if($username == "test" && $password == "test"){
                $user = new User();
                $user->username = $username;
                $user->password = $password;
                $user->role = 'user'; //to change with model and DB
                $this->Auth->setUser($user);
                //$this->Flash->success(__('Identifié'));
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout(){
        $this->redirect($this->Auth->logout());
    }
}