<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ControlObjects Controller
 *
 * @property \App\Model\Table\ControlObjectsTable $ControlObjects
 */
class ControlObjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentControlObjects']
        ];
        $controlObjects = $this->paginate($this->ControlObjects);

        $this->set(compact('controlObjects'));
        $this->set('_serialize', ['controlObjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Control Object id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $controlObject = $this->ControlObjects->get($id, [
            'contain' => ['ParentControlObjects', 'ChildControlObjects']
        ]);

        $this->set('controlObject', $controlObject);
        $this->set('_serialize', ['controlObject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $controlObject = $this->ControlObjects->newEntity();
        if ($this->request->is('post')) {
            $controlObject = $this->ControlObjects->patchEntity($controlObject, $this->request->data);
            if ($this->ControlObjects->save($controlObject)) {
                $this->Flash->success(__('The control object has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The control object could not be saved. Please, try again.'));
            }
        }
        $parentControlObjects = $this->ControlObjects->find('treeList', ['valuePath' => 'name'])->toArray();
        $this->set(compact('controlObject', 'parentControlObjects'));
        $this->set('_serialize', ['controlObject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Control Object id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $controlObject = $this->ControlObjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $controlObject = $this->ControlObjects->patchEntity($controlObject, $this->request->data);
            if ($this->ControlObjects->save($controlObject)) {
                $this->Flash->success(__('The control object has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The control object could not be saved. Please, try again.'));
            }
        }
        $parentControlObjects = $this->ControlObjects->ParentControlObjects->find('list', ['limit' => 200]);
        $this->set(compact('controlObject', 'parentControlObjects'));
        $this->set('_serialize', ['controlObject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Control Object id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $controlObject = $this->ControlObjects->get($id);
        if ($this->ControlObjects->delete($controlObject)) {
            $this->Flash->success(__('The control object has been deleted.'));
        } else {
            $this->Flash->error(__('The control object could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
