<?php
App::uses('AppController', 'Controller');
/**
 * Configs Controller
 * @property Config $Config
 */
class ConfigsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->set('configs', $this->Config->find('all'));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Config->id = $id;
        if (!$this->Config->exists()) {
            throw new NotFoundException(__('Invalid config'));
        }
        $this->set('config', $this->Config->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Config->create();
            if ($this->Config->save($this->request->data)) {
                $this->Session->setFlash(__('The config has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The config could not be saved. Please, try again.'));
            }
        }
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Config->id = $id;
        if (!$this->Config->exists()) {
            throw new NotFoundException(__('Invalid config'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Config->save($this->request->data)) {
                $this->Session->setFlash(__('The config has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The config could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Config->read(null, $id);
        }
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
        $this->Config->id = $id;
        if (!$this->Config->exists()) {
            throw new NotFoundException(__('Invalid config'));
        }
        if ($this->Config->delete()) {
            $this->Session->setFlash(__('Config deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Config was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}