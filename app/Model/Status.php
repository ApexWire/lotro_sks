<?php
App::uses('AppModel', 'Model');
/**
 * Status Model
 *
 * @property Player $Player
 */
class Status extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'status';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'status' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter a player status here',
                'allowEmpty' => false,
                'required' => true,
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'Player' => array(
            'className' => 'Player',
                'foreignKey' => 'status_id',
                'dependent' => false,
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