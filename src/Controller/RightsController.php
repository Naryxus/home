<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rights Controller
 *
 * @property \App\Model\Table\RightsTable $Rights
 */
class RightsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $rights = $this->paginate($this->Rights);

        $this->set(compact('rights'));
        $this->set('_serialize', ['rights']);
    }

    /**
     * View method
     *
     * @param string|null $id Right id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $right = $this->Rights->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('right', $right);
        $this->set('_serialize', ['right']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $right = $this->Rights->newEntity();
        if ($this->request->is('post')) {
            $right = $this->Rights->patchEntity($right, $this->request->data);

            if ($this->Rights->save($right)) {
				$requestObject = $this->Rights->RequestObjects->newEntity();
				$requestObject->model = 'Right';
				$requestObject->foreign_key = $right->id;
				if($this->Rights->RequestObjects->save($requestObject)) {
					$this->Flash->success(__('The right has been saved.'));
					return $this->redirect(['action' => 'index']);
				}
            } else {
                $this->Flash->error(__('The right could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('right'));
        $this->set('_serialize', ['right']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Right id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $right = $this->Rights->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $right = $this->Rights->patchEntity($right, $this->request->data);
            if ($this->Rights->save($right)) {
                $this->Flash->success(__('The right has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The right could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('right'));
        $this->set('_serialize', ['right']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Right id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $right = $this->Rights->get($id);
        if ($this->Rights->delete($right)) {
            $this->Flash->success(__('The right has been deleted.'));
        } else {
            $this->Flash->error(__('The right could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
