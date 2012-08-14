<?php
App::uses('AppController', 'Controller');
/**
 * Characters Controller
 *
 * @property Character $Character
 */
class CharactersController extends AppController {

    public $uses        = array('Player', 'Character');
    public $components  = array('LotroAPI');
/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->set('characters', $this->Character->find('all', array('order' => 'Character.characterName ASC')));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Character->id = $id;
        if (!$this->Character->exists()) {
            throw new NotFoundException(__('Invalid character'));
        }
        $this->set('character', $this->Character->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Character->create();
            if ($this->Character->save($this->request->data)) {
                $this->Session->setFlash(__('The character has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The character could not be saved. Please, try again.'));
            }
        }
        $players = $this->Character->Player->find('list');
        $this->set(compact('players'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Character->id = $id;
        if (!$this->Character->exists()) {
            throw new NotFoundException(__('Invalid character'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Character->save($this->request->data)) {
                $this->Session->setFlash(__('The character has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The character could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Character->read(null, $id);
        }
        $players = $this->Character->Player->find('list');
        $this->set(compact('players'));
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
        $this->Character->id = $id;
        if (!$this->Character->exists()) {
            throw new NotFoundException(__('Invalid character'));
        }
        if ($this->Character->delete()) {
            $this->Session->setFlash(__('Character deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Character was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
 * showCharacters method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function showCharactersByPlayer($id = null) {
        $this->set('characters', $this->Character->find('all', array('conditions' => array('player_id' => $id))));
        $this->set('player', $this->Player->read(null, $id));
    }
}