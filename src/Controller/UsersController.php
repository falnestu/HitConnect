<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 30.09.17
 * Time: 14:18
 */

namespace App\Controller;


use App\Form\RegisterForm;
use Cake\Event\Event;

class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['login', 'register']);
    }

    public function login(){
        $this->set('title', 'Login');
        $this->set('activeItem', 'signin');
        if($this->request->is('post')){
            $user = $this->Auth->identify(); //si on a une DB
            if($user != null){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function register(){
        $this->set('title', 'Register');
        $this->set('activeItem', 'register');
        $registerForm = new RegisterForm();
        if($this->request->is('post')){
            if ($registerForm->execute($this->request->getData()))
            {
                $this->Flash->success(__('Votre user a été sauvegardé.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Impossible d\'ajouter votre user.'));
        }
        $this->set('registerForm',$registerForm);
    }

    public function logout(){
        $this->redirect($this->Auth->logout());
    }
}