<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 30.09.17
 * Time: 14:18
 */

namespace App\Controller;


use App\Form\RegisterForm;
use App\Model\Entity\User;
use Cake\Event\Event;

class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'register']);
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

    public function register(){
        $registerForm = new RegisterForm();
        if($this->request->is('post')){
            if ($registerForm->execute($this->request->getData()))
            {
                $user = $this->Users->newEntity([
                    'lastname' => $registerForm->lastname
                    , 'firstname' => $registerForm->firstname
                    , 'email' => $registerForm->email
                    , 'password' => $registerForm->password
                    ]);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Votre user a été sauvegardé.'));
                    return $this->redirect(['action' => 'login']);
                }
            }
            $this->Flash->error(__('Impossible d\'ajouter votre user.'));
        }
        $this->set('registerForm',$registerForm);
    }

    public function logout(){
        $this->redirect($this->Auth->logout());
    }
}