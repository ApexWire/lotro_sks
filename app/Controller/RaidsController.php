<?php
App::uses('AppController', 'Controller');
/**
 * Raids Controller
 *
 * @property Raid $Raid
 */
class RaidsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->set('raids', $this->Raid->find('all', array('order' => 'Raid.name ASC')));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Raid->id = $id;
        if (!$this->Raid->exists()) {
            throw new NotFoundException(__('Invalid raid'));
        }
        $this->set('raid', $this->Raid->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Raid->create();
            if ($this->Raid->save($this->request->data)) {
                $this->Session->setFlash(__('The Raid has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Raid could not be saved. Please, try again'));
            }
        }

        /*
        if ($this->request->is('post')) {
            $dataSource = $this->Raid->getDataSource();
            $dataSource->begin();

            $this->Raid->create();

            $data       = $this->Raid->save($this->request->data);
            $rankings   = $this->_insertRaidToRanking($data);

            if ($rankings) {
                $dataSource->commit ();
                $this->Session->setFlash(__('The raid has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $dataSource->rollback ();
                $this->Session->setFlash(__('The raid could not be saved. Please, try again.'));
            }
        }
        */
    }
/*
    protected function _insertRaidToRanking($data) {
        $uuid   = $data['Raid']['id'];

        $root   = $this->Ranking->find('first', array('conditions' => 'parent_id IS NULL'));

        $dataSource = $this->Ranking->getDataSource();
        $dataSource->begin();

        if ($root)  $root = $this->Ranking->createRaid($uuid);
        if ($root)  $dataSource->commit();
        else        $dataSource->rollback();

        return $root;
    }
*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Raid->id = $id;
        if (!$this->Raid->exists()) {
            throw new NotFoundException(__('Invalid raid'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Raid->save($this->request->data)) {
                $this->Session->setFlash(__('The raid has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The raid could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Raid->read(null, $id);
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
        $this->Raid->id = $id;
        if (!$this->Raid->exists()) {
            throw new NotFoundException(__('Invalid raid'));
        }
        if ($this->Raid->delete()) {
            $this->Session->setFlash(__('Raid deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Raid was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}