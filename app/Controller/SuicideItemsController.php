<?php
App::uses('AppController', 'Controller');
/**
 * SuicideItems Controller
 *
 * @property SuicideItem $SuicideItem
 */
class SuicideItemsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->set('suicideItems', $this->SuicideItem->find('all', array('order' => 'name ASC')));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->SuicideItem->id = $id;
        if (!$this->SuicideItem->exists()) {
            throw new NotFoundException(__('Invalid suicide item'));
        }
        $this->set('suicideItem', $this->SuicideItem->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->SuicideItem->create();
            if ($this->SuicideItem->save($this->request->data)) {
                $this->Session->setFlash(__('The suicide item has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The suicide item could not be saved. Please, try again.'));
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
        $this->SuicideItem->id = $id;
        if (!$this->SuicideItem->exists()) {
            throw new NotFoundException(__('Invalid suicide item'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->SuicideItem->save($this->request->data)) {
                $this->Session->setFlash(__('The suicide item has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The suicide item could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->SuicideItem->read(null, $id);
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
        $this->SuicideItem->id = $id;
        if (!$this->SuicideItem->exists()) {
            throw new NotFoundException(__('Invalid suicide item'));
        }
        if ($this->SuicideItem->delete()) {
            $this->Session->setFlash(__('Suicide item deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Suicide item was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}