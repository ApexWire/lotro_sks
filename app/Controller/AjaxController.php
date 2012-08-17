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
            $parentId   = $this->Ranking->field('id', array('name' => $raidId));
            $ranking    = $this->Ranking->generateTreeList(array('AND' => array('Ranking.parent_id' => $parentId, 'OR' => array('Ranking.name' => $conditions))));
            foreach ($ranking as $key => $value) {
                foreach ($this->request->data['players'] as $player) {
                    if ($value == $player['id']) {
                        $ranking[$key]                  = array();
                        $ranking[$key]['id']            = $value;
                        $ranking[$key]['playerName']    = $player['player'];
                        $ranking[$key]['characterName'] = $player['character'];
                        break;
                    }
                }
            }
            $this->set('rankings', $ranking);
        } else {
            $this->redirect("/");
        }
    }
}