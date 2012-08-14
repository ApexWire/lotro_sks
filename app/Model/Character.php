<?php
App::uses('AppModel', 'Model');
/**
 * Character Model
 *
 * @property Player $Player
 */
class Character extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'characterName' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter a character name!',
                'allowEmpty' => false,
                'required' => true,
            ),
            'isunique' => array(
                'rule' => array('isUnique'),
                'message' => 'The Character already exists',
            ),
        ),
        'player_id' => array(
            'uuid' => array(
                'rule' => array('uuid'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'Player' => array(
            'className' => 'Player',
                'foreignKey' => 'player_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
        )
    );

    public function beforeSave() {
        App::import("Component", "LotroAPI");
        $lotroAPI   = new LotroAPIComponent();
        $xmlData    = $lotroAPI->getCharacterData($this->data['Character']['characterName']);

        if (array_key_exists('error', $xmlData['apiresponse'])) return false;

        $this->data['Character']['characterRace']   = $xmlData['apiresponse']['character']['@race'];
        $this->data['Character']['characterClass']  = $xmlData['apiresponse']['character']['@class'];
        $this->data['Character']['characterLevel']  = $xmlData['apiresponse']['character']['@level'];

        return ($this->data);
    }
}
