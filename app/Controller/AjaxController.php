<?php

class AjaxController extends AppController {
    public $components  = array('RequestHandler');
    public $uses        = array('Ranking', 'Player');

    public function loadRankings() {
        if ($this->request->is('ajax')) {
            $raidId     = $this->request->data['raidId'];
            $conditions = array();
            foreach ($this->request->data['players'] as $player) {
                $conditions[]   = $player['id'];
            }
            $parentId   = $this->Ranking->field('id', 'Ranking.parent_id IS NULL');
            $ranking    = $this->Ranking->find('all', array('conditions' => array('Ranking.parent_id' => $parentId, 'Ranking.name' => $conditions)));
            debug($ranking);
        } else {

        }
    }
}