<?php
App::uses('AppModel', 'Model');
/**
 * Player Model
 *
 * @property Status $Status
 * @property Character $Character
 * @property Ranking $Ranking
 */
class Player extends AppModel {

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
        'name' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter the player name here!',
                'allowEmpty' => false,
                'required' => true,
            ),
            'isunique' => array(
                'rule' => array('isUnique'),
                'message' => 'The player already exists!',
            ),
        ),
        'status_id' => array(
            'uuid' => array(
                'rule' => array('uuid'),
                'message' => 'Set a player status!',
                'allowEmpty' => false,
                'required' => true,
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
        'Status' => array(
            'className' => 'Status',
            'foreignKey' => 'status_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'Character' => array(
            'className' => 'Character',
            'foreignKey' => 'player_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}