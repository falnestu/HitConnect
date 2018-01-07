<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 17.12.17
 * Time: 11:15
 */

namespace App\Controller;


use App\Model\BU\PreferencesManager;
use App\Model\MusicBrainz\Facade\MBServiceAgent;

class PreferencesController extends AppController
{
    public function index(){
        $this->set('title', 'Mes préférences');
        $preferences = PreferencesManager::getAllByUserId($this->Auth->user('id'));
        $this->set('preferences', $preferences);
    }

    public function search(){
        if($this->request->is('post')){
            $search = $this->request->getData('search');
            $result = MBServiceAgent::recording()->search($search);
            $this->set('entities', $result);
        }
    }

    public function add(){
        if($this->request->is('post')){
            if(PreferencesManager::add($this->request->getData(), $this->Auth->user('id')))
                $this->Flash->success(__('Nouvelle préférence enregistrée'));
            else
                $this->Flash->error(__('Préférence déjà existante'));
        }
        return $this->redirect("/preferences/index");
    }

    public function delete($id){
        if ($this->request->is('post')){
            if(PreferencesManager::delete($id))
                $this->Flash->success(__('Préférence supprimée'));
        }
        return $this->redirect("/preferences/index");
    }
}