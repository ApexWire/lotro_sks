<?php
App::uses('AppModel', 'Model');
/**
 * Config Model
 *
 */
class Config extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'developer_name';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'developer_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter your LotRO developer name here',
                'allowEmpty' => false,
                'required' => true,
            ),
            'isunique' => array(
                'rule' => array('isUnique'),
                'message' => 'The developer name is already in use!',
            ),
        ),
        'api_key' => array(
            'notempty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter your LotRO API-key here',
                'allowEmpty' => false,
                'required' => true,
            ),
            'minlength' => array(
                'rule' => array('minLength', 32),
                'message' => 'Your LotRO API-key must have 32 digits',
                'allowEmpty' => false,
                'required' => true,
            ),
            'maxlength' => array(
                'rule' => array('maxLength', 32),
                'message' => 'Your LotRO API-key must have 32 digits',
                'allowEmpty' => false,
                'required' => true,
            ),
            'isunique' => array(
                'rule' => array('isUnique'),
                'message' => 'The Api key is already in use!',
            ),
        ),
        'url' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter the URL for API Query',
                'allowEmpty' => false,
                'required' => true,
            ),
        ),
        'worldname' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter the worldname, you want to use',
                'allowEmpty' => false,
                'required' => true,
            ),
        ),
        'maxLevel' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please enter the maximum level of characters',
                'allowEmpty' => false,
                'required' => true,
            ),
        ),
    );
}