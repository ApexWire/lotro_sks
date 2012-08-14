<?php
App::uses('AppController', 'Controller');
/**
 * Lorebooks Controller
 *
 * @property Lorebook $Lorebook
 */
class LorebooksController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Lorebook->recursive = 0;
        $this->set('lorebooks', $this->paginate());
    }

    public function importFile() {
        $messages   = $this->Lorebook->importIDsFromFile();
        debug($messages);
    }

    public function updateItemsFromAPI() {
        debug($this->Lorebook->updateFromAPI());
    }

    /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Lorebook->id = $id;
        if (!$this->Lorebook->exists()) {
            throw new NotFoundException(__('Invalid lorebook'));
        }
        $this->set('lorebook', $this->Lorebook->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Lorebook->create();
            if ($this->Lorebook->save($this->request->data)) {
                $this->Session->setFlash(__('The lorebook has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The lorebook could not be saved. Please, try again.'));
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
        $this->Lorebook->id = $id;
        if (!$this->Lorebook->exists()) {
            throw new NotFoundException(__('Invalid lorebook'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Lorebook->save($this->request->data)) {
                $this->Session->setFlash(__('The lorebook has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The lorebook could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Lorebook->read(null, $id);
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
        $this->Lorebook->id = $id;
        if (!$this->Lorebook->exists()) {
            throw new NotFoundException(__('Invalid lorebook'));
        }
        if ($this->Lorebook->delete()) {
            $this->Session->setFlash(__('Lorebook deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Lorebook was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}