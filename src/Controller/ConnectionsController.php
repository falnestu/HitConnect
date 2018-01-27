<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\BU\ConnectionsManager;
use App\Model\Table\ConnectionsTable;

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

    public function index()
    {
        $this->set('title', 'Ajout de connexions');
        $user_id = $this->Auth->user('id');
        $invitations = $this->ConnectionMapper->ToSimpleConnections(ConnectionsManager::getInvitationsByUserId($user_id), $user_id);
        $this->set(compact('invitations'));
        $matches = ConnectionsManager::getMatchesByUserId($user_id);
        $this->set(compact('matches'));
    }

    public function view($id = null)
    {
        $this->set('title', 'Mes connexions');
        $user_id = $this->Auth->user('id');
        $connections = $this->ConnectionMapper->ToSimpleConnections(ConnectionsManager::getActiveConnectionsByUserId($user_id), $user_id);
        $this->set('connections', $connections);
    }

    public function add($target_user_id)
    {
        if ($this->request->is('post') && isset($target_user_id)) {
            if (ConnectionsManager::addInvitations($this->Auth->user('id'), $target_user_id)) {
                $this->Flash->success(__('Invitation envoyée'));
            }
            else
                $this->Flash->error(__('The connection could not be saved. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function acceptInvitation($connection_id){
        if ($this->request->is('post') && isset($connection_id)){
            if (ConnectionsManager::updateStatus($connection_id, ConnectionsTable::STATUS_ACCEPTED))
                $this->Flash->success(__('Invitation acceptée!'));
            else
                $this->Flash->error(__('The connection could not be saved. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function denyInvitation($connection_id){
        if ($this->request->is('post') && isset($connection_id)){
            if (ConnectionsManager::updateStatus($connection_id, ConnectionsTable::STATUS_REFUSED))
                $this->Flash->success(__('Invitation refusée!'));
            else
                $this->Flash->error(__('The connection could not be saved. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
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
