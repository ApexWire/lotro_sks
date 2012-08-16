<?php

class AjaxController extends AppController {
    public $components  = array('RequestHandler');
    public $uses        = array('Ranking', 'Player');

    public function beforeRender() {
        if ($this->RequestHandler->isAjax()) {
            //Configure::write('debug', 0);
            if ($this->RequestHandler->prefers() == 'json') {
                die(json_encode($this->viewVars));
            } else {
                $this->layout = 'ajax';
            }
        }
    }

    public function loadRankings() {
        if ($this->request->is('ajax')) {
            $raidId     = $this->request->data['raidId'];
            $conditions = array();
            foreach ($this->request->data['players'] as $player) {
                $conditions[]   = $player['id'];
            }
            $parentId   = $this->Ranking->field('id', 'Ranking.parent_id IS NULL');
            $ranking    = $this->Ranking->find('all', array('conditions' => array('AND' => array('Ranking.parent_id' => $parentId, 'Ranking.name' => $conditions))));
            $this->set('rankings', $ranking);
        } else {
            $this->redirect("/");
        }
    }
}