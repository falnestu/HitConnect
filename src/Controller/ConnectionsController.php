<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\BU\ConnectionsManager;

/**
 * Connections Controller
 *
 * @property \App\Model\Table\ConnectionsTable $Connections
 *
 * @method \App\Model\Entity\Connection[] paginate($object = null, array $settings = [])
 */
class ConnectionsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('ConnectionMapper');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->set('title', 'Ajout de connexions');
        $user_id = $this->Auth->user('id');
        $invitations = $this->ConnectionMapper->ToSimpleConnections(ConnectionsManager::getInvitationsByUserId($user_id), $user_id);
        $this->set(compact('invitations'));
        $suggestions = ConnectionsManager::getSuggestionsByUserId($user_id);
        $this->set(compact('suggestions'));
    }

    /**
     * View method
     *
     * @param string|null $id Connection id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('title', 'Mes connexions');
        $user_id = $this->Auth->user('id');
        $connections = $this->ConnectionMapper->ToSimpleConnections(ConnectionsManager::getActiveConnectionsByUserId($user_id), $user_id);
        $this->set('connections', $connections);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $connection = $this->Connections->newEntity();
        if ($this->request->is('post')) {
            $connection = $this->Connections->patchEntity($connection, $this->request->getData());
            if ($this->Connections->save($connection)) {
                $this->Flash->success(__('The connection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The connection could not be saved. Please, try again.'));
        }
        $users = $this->Connections->Users->find('list', ['limit' => 200]);
        $connectionsStatus = $this->Connections->ConnectionsStatus->find('list', ['limit' => 200]);
        $this->set(compact('connection', 'users', 'connectionsStatus'));
        $this->set('_serialize', ['connection']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Connection id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $connection = $this->Connections->get($id);
        if ($this->Connections->delete($connection)) {
            $this->Flash->success(__('The connection has been deleted.'));
        } else {
            $this->Flash->error(__('The connection could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'view']);
    }
}
