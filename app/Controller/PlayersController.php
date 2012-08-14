<?php
App::uses('AppController', 'Controller');
/**
 * Players Controller
 *
 * @property Player $Player
 */
class PlayersController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->set('players', $this->Player->find('all', array('order' => 'Player.name ASC')));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Player->id = $id;
        if (!$this->Player->exists()) {
            throw new NotFoundException(__('Invalid player'));
        }
        $this->set('player', $this->Player->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Player->create();
            if ($this->Player->save($this->request->data)) {
                $this->Session->setFlash(__('The player has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The player could not be saved. Please, try again.'));
            }
        }
        $statuses = $this->Player->Status->find('list');
        $this->set(compact('statuses'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Player->id = $id;
        if (!$this->Player->exists()) {
            throw new NotFoundException(__('Invalid player'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Player->save($this->request->data)) {
                $this->Session->setFlash(__('The player has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The player could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Player->read(null, $id);
        }
        $statuses = $this->Player->Status->find('list');
        $this->set(compact('statuses'));
    }

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Player->id = $id;
        if (!$this->Player->exists()) {
            throw new NotFoundException(__('Invalid player'));
        }
        if ($this->Player->delete()) {
            $this->Session->setFlash(__('Player deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Player was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}