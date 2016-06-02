<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Permissions Controller
 *
 * @property \App\Model\Table\PermissionsTable $Permissions
 */
class PermissionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        /*$this->paginate = [
            'contain' => ['ControlObjects', 'RequestObjects']
        ];
        $permissions = $this->paginate($this->Permissions);*/
        $controlObjects = $this->Permissions->ControlObjects->find('treeList', ['valuePath' => 'name'])->toArray();
        $this->loadModel('Users');
        $this->loadModel('Rights');
        $requestObjects = $this->Permissions->RequestObjects->find('children', ['for' => 1])->find('threaded')->toArray();
        /*for($i = 0; $i < count($requestObjects); $i++) {
            if($requestObjects[$i]['RequestObject']['model'] == 'User') {
                $user = $this->Users->get($requestObjects[$i]['RequestObject']['foreign_key']);
                $requestObjects[$i]['RequestObject']['name'] = $user['User']['username'];
            } else {
                $right = $this->Rights->get($requestObjects[$i]['RequestObject']['foreign_key']);
                $requestObjects[$i]['RequestObject']['name'] = $right['Right']['name'];
            }
        }*/

        $this->set(compact('controlObjects', 'requestObjects'));
        $this->set('_serialize', ['permissions']);
    }

    /**
     * View method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => ['ControlObjects', 'RequestObjects']
        ]);

        $this->set('permission', $permission);
        $this->set('_serialize', ['permission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permission = $this->Permissions->newEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->data);
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The permission could not be saved. Please, try again.'));
            }
        }
        $controlObjects = $this->Permissions->ControlObjects->find('list', ['limit' => 200]);
        $requestObjects = $this->Permissions->RequestObjects->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'controlObjects', 'requestObjects'));
        $this->set('_serialize', ['permission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->data);
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The permission could not be saved. Please, try again.'));
            }
        }
        $controlObjects = $this->Permissions->ControlObjects->find('list', ['limit' => 200]);
        $requestObjects = $this->Permissions->RequestObjects->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'controlObjects', 'requestObjects'));
        $this->set('_serialize', ['permission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permission = $this->Permissions->get($id);
        if ($this->Permissions->delete($permission)) {
            $this->Flash->success(__('The permission has been deleted.'));
        } else {
            $this->Flash->error(__('The permission could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
