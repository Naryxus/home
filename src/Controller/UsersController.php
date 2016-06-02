<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

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

	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
	}

	public function index() {

	}

	public function login() {
		if($this->request->is('post')) {
			$user = $this->Auth->identify();
			if($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Your username or password is incorrect'));
		}
	}

	public function add() {
		$user = $this->Users->newEntity();
		$rights = $this->Users->Rights->find('list')->toArray();
		if($this->request->is('post')) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if($this->Users->save($user)) {
				$requestObject = $this->Users->RequestObjects->newEntity();
				$requestObject->model = 'User';
				$requestObject->foreign_key = $user->id;
				$requestObject->parent_id = $this->Users->get($user->id, ['contain' => ['Rights' => ['RequestObjects']]])->right->request_object->id;
				if($this->Users->RequestObjects->save($requestObject)) {
					$this->Flash->success(__('The user has been saved.'));
					if (!$this->Auth->user())
						return $this->viewBuilder()->layout('visitor');
					return $this->redirect(['action' => 'index']);
				}
			} else
				$this->Flash->error(__('The user could not be saved.'));
		}
		$this->set(compact('user', 'rights'));
		$this->set('_serialize', ['user']);
	}
}
?>