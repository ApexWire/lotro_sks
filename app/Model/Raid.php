<?php
App::uses('AppModel', 'Model');
/**
 * Raid Model
 *
 * @property Ranking $Ranking
 */
class Raid extends AppModel {

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
                'message' => 'Please enter the raid name here.',
                'allowEmpty' => false,
                'required' => true,
            ),
            'isunique' => array(
                'rule' => array('isUnique'),
                'message' => 'The raid already exists!',
            ),
        ),
        'maxPlayer' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please enter the maximum number of player',
                'allowEmpty' => false,
                'required' => true,
            ),
        ),
    );

}