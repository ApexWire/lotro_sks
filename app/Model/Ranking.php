<?php
App::uses('AppModel', 'Model');
/**
 * Ranking Model
 *
 * @property Raid $Raid
 * @property Player $Player
 */
class Ranking extends AppModel {
    public $name    = 'Ranking';
    public $actsAs  = array('Tree');

    public function createRoot() {
        $data   = array();
        $data['Ranking']['parent_id']   = null;
        $data['Ranking']['name']        = "Lotro SKS ROOT";
        return $this->save($data);
    }

    public function insertRaids($raids) {
        $parentId   = $this->field('id', 'parent_id IS NULL');
        $error      = false;

        $dataSource = $this->getDataSource();
        $dataSource->begin();

        foreach ($raids as $raid) {
            if (!$this->_checkRaidInRanking($raid['Raid']['id'])) {
                $this->create();
                $data   = array();
                $data['Ranking']['parent_id']   = $parentId;
                $data['Ranking']['name']        = $raid['Raid']['id'];
                $data['Ranking']['is_player']   = false;
                $data['Ranking']['is_raid']     = true;
                if (!$this->save($data)) $error = true;
            }
        }

        if (!$error)    $dataSource->commit ();
        else            $dataSource->rollback ();
        return !$error;
    }

    public function insertPlayers() {
        $rootId     = $this->field('id', 'parent_id IS NULL');
        $parents    = $this->find('all', array('conditions' => array('parent_id' => $rootId)));
        $error      = false;
        App::import('Model', 'Player');
        $playersModel   =& new Player();

        $dataSource = $this->getDataSource();
        $dataSource->begin();

        foreach ($parents as $parent) {
            $players    = $playersModel->find('all', array('order' => 'RAND()'));

            foreach ($players as $player) {
                if (!$this->_checkPlayerInRaid($parent['Ranking']['id'], $player['Player']['id'])) {
                    $this->create();
                    $data   = array();
                    $data['Ranking']['parent_id']   = $parent['Ranking']['id'];
                    $data['Ranking']['name']        = $player['Player']['id'];
                    $data['Ranking']['is_player']   = true;
                    $data['Ranking']['is_raid']     = false;
                    if (!$this->save($data)) $error = true;
                }
            }
        }

        if (!$error)    $dataSource->commit();
        else            $dataSource->rollback ();
        return !$error;
    }

    public function getSKSForRaid($parentId) {
        App::import('Model', 'Player');
        $rankings       = $this->generateTreeList(array('parent_id' => $parentId));
        $sks            = array();
        $playerModel    =& new Player();
        foreach ($rankings as $key => $ranking) {
            $player = $playerModel->find('first', array('conditions' => array('Player.id' => $ranking)));
            $sks[]  = $player;
        }
        return $sks;
    }

    protected function _checkRaidInRanking($uuid) {
        if ($this->find('count', array('conditions' => array('Ranking.name' => $uuid ))) == 0) return false;
        else return true;
    }

    protected function _checkPlayerInRaid($parentId, $uuid) {
        if ($this->find('count', array('conditions' => array('Ranking.parent_id' => $parentId, 'Ranking.name' => $uuid))) == 0) return false;
        else return true;
    }

}