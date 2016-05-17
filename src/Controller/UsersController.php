<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

	public function initialize() {
		parent::initialize();
		$this->Auth->allow(['add']);
	}

	public function add() {
		$user = $this->Users->newEntity();
		if($this->request->is('post')) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else
				$this->Flash->error(__('The user could not be saved.'));
		}
		$this->set(compact('user'));
		$this->set('_serialize', ['user']);
	}
}
?>