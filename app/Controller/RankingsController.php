<?php
App::uses('AppController', 'Controller');
/**
 * Rankings Controller
 *
 * @property Ranking $Ranking
 */
class RankingsController extends AppController {
    public $actsAs  = array('Tree');
    public $uses    = array('Raid', 'Ranking', 'Player', 'SuicideItem');

    /**
 * index method
 *
 * @return void
 */
    public function index() {
        $rankings   = $this->Ranking->find('all');
        foreach ($rankings as $key => $ranking) {
            if ($ranking['Ranking']['name'] == 'Lotro SKS ROOT') continue;
            if ($ranking['Ranking']['is_player']) {
                $player = $this->Player->find('first', array('conditions' => array('Player.id' => $ranking['Ranking']['name'])));
                $rankings[$key]['Ranking']['name']  = $player['Player']['name'];
            } else {
                $raid   = $this->Raid->find('first', array('conditions' => array('Raid.id' => $ranking['Ranking']['name'])));
                $rankings[$key]['Ranking']['name']  = $raid['Raid']['name'];
            }
        }
        $this->set('rankings', $rankings);
    }

    public function initTree() {
        if (!$this->Ranking->find('first', array('conditions' => 'parent_id IS NULL'))) {
            $this->Ranking->createRoot();
            $this->Session->setFlash('Ranking tree initialized!');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Root parent already exists!');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function initRaids() {
        $raids  = $this->Raid->find('all');
        if (count($raids) == 0) {
            $this->Session->setFlash('No raids to insert!');
            $this->redirect(array('action' => 'index'));
        }
        if (!$this->Ranking->field('id', 'parent_id IS NULL')) {
            $this->Session->setFlash('No root initialized!');
            $this->redirect(array('action' => 'index'));
        }
        if($this->Ranking->insertRaids($raids)) {
            $this->Session->setFlash('Raids has been inserted into Rankings');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Raids could not be saved! Please, try again');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function initPlayers() {
        $players    = $this->Player->find('all', array('order' => 'RAND()'));
        if (count($players) == 0) {
            $this->Session->setFlash('No players to insert!');
            $this->redirect(array('action' => 'index'));
        }
        if (!$this->Ranking->field('id', 'parent_id IS NULL')) {
            $this->Session->setFlash('No root initialized!');
            $this->redirect(array('action' => 'index'));
        }
        if (!$this->Ranking->field('parent_id', 'parent_id = ' . $this->Ranking->field('id', 'parent_id IS NULL'))) {
            $this->Session->setFlash('No raids inserted!');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Ranking->insertPlayers()) {
            $this->Session->setFlash('Player has been inserted into Rankings');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Players could not be saved! Please, try again');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function showSKS($parentId) {
        $this->set('sks', $this->Ranking->getSKSForRaid($parentId));
        $this->set('raid', $this->Raid->find('first', array('conditions' => array('id' => $this->Ranking->field('name', array('id' => $parentId))))));
    }

    public function newSuicideList($parentId) {
        $this->set('players', $this->Player->find('all', array('order' => 'name ASC')));
        $this->set('raid', $this->Raid->find('first', array('conditions' => array('id' => $this->Ranking->field('name', array('id' => $parentId))))));
        $this->set('items', $this->SuicideItem->find('all', array('order' => 'name ASC')));
    }

    public function ajaxRequest() {
        
    }

    /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->Ranking->id = $id;
        if (!$this->Ranking->exists()) {
            throw new NotFoundException(__('Invalid ranking'));
        }
        $this->set('ranking', $this->Ranking->read(null, $id));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Ranking->create();
            if ($this->Ranking->save($this->request->data)) {
                $this->Session->setFlash(__('The ranking has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The ranking could not be saved. Please, try again.'));
            }
        }
        $raids = $this->Ranking->Raid->find('list');
        $players = $this->Ranking->Player->find('list');
        $this->set(compact('raids', 'players'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Ranking->id = $id;
        if (!$this->Ranking->exists()) {
            throw new NotFoundException(__('Invalid ranking'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Ranking->save($this->request->data)) {
                $this->Session->setFlash(__('The ranking has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The ranking could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Ranking->read(null, $id);
        }
        $raids = $this->Ranking->Raid->find('list');
        $players = $this->Ranking->Player->find('list');
        $this->set(compact('raids', 'players'));
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
        $this->Ranking->id = $id;
        if (!$this->Ranking->exists()) {
            throw new NotFoundException(__('Invalid ranking'));
        }
        if ($this->Ranking->delete()) {
            $this->Session->setFlash(__('Ranking deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Ranking was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}