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

    public function suicidePlayer() {
        if ($this->request->is('ajax')) {
            /**
             * Tree Example:
             *
             * id   | parent_id | lft   | rght  | name      | is_player | is_raid
             * ==================================================================
             * 1    | NULL      | 1     | 18    | root      | 0         | 0
             * 2    | 1         | 2     | 17    | raid      | 0         | 1
             * 3    | 2         | 3     | 4     | player 1  | 1         | 0
             * 4    | 2         | 5     | 6     | player 2  | 1         | 0
             * 5    | 2         | 7     | 8     | player 3  | 1         | 0
             * 6    | 2         | 9     | 10    | player 4  | 1         | 0
             * 7    | 2         | 11    | 12    | player 5  | 1         | 0
             * 8    | 2         | 13    | 14    | player 6  | 1         | 0
             * 9    | 2         | 15    | 16    | player 7  | 1         | 0
             *
             * Current Ranking:
             *
             * 1. player 1      <- stay
             * 2. player 2      <- move to 5.
             * 3. player 3      <- stay
             * 4. player 4      <- move to 2.
             * 5. player 5      <- move to 4.
             * 6. player 6      <- stay
             * 7. player 7      <- stay
             *
             * Current Raidmembers:
             *
             * 1. player 2
             * 2. player 4
             * 3. player 5
             *
             * Suicide Player "player 2":
             *
             * getListRange:    SELECT COUNT(id) FROM rankings WHERE parent_id = 2; (7)
             * getRaidRange:    (3)
             * getSuicide:      SELECT * FROM rankings WHERE name = "player 2"; (4)
             * getLastMember:   SELECT * FROM rankings WHERE name = "player 5"; (7)
             * getDelta:        ((getLastMember.rght) -(getSuicide.rght)) / 2; (3)
             *
             * Move:
             * moveDown(4,3):
             * 1. player 1      <- stay
             * 2. player 3      <- MOVED ONE UP, move to 3.
             * 3. player 4      <- MOVED ONE UP, move to 2.
             * 4. player 5      <- MOVED ONE UP
             * 5. player 2      <- MOVED THREE DOWN
             * 6. player 6      <- stay
             * 7. player 7      <- stay
             *
             * getMover:        SELECT * FROM rankings WHERE name = "player 4"; (6)
             * moveUp(6,1):
             * 1. player 1      <- stay
             * 2. player 4      <- MOVED ONE UP
             * 3. player 3      <- MOVED ONE DOWN
             * 4. player 5      <- stay
             * 5. player 2      <- stay
             * 6. player 6      <- stay
             * 7. player 7      <- stay
             * 
             */


            debug($this->request->data);
        } else {
            $this->redirect("/");
        }
    }
}