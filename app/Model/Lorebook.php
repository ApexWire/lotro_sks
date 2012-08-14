<?php
App::uses('AppModel', 'Model');
/**
 * Lorebook Model
 *
 */
class Lorebook extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
    public $useTable = 'lorebook';

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
        'itemid' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    public function importIDsFromFile() {
        $filename   = APP . '../data/ids.txt';
        set_time_limit(3600);
        App::import('Vendor', 'parsecsv');
        $csv    = new parseCSV($filename);
        $csv->delimiter = ';';
        $csv->enclosure = '';
        $csv->parse();
        foreach ($csv->data as $key => $value) {
            $this->create();
            $data   = array();
            $data['Lorebook']['itemid'] = $value['itemid'];
            $this->save($data);
        }
    }

    public function updateFromAPI() {
        App::import('Component', 'LotroAPI');
        set_time_limit(3600);
        $items  = $this->find('all', array('order' => 'itemid ASC'));
        if (count($items) > 0) {
            $lotroAPI   = new LotroAPIComponent();
            $i = 0;
            foreach ($items as $item) {
                if (!is_null($item['Lorebook']['name']))    continue;
                $xmlData    = $lotroAPI->getItemData($item['Lorebook']['itemid']);
                if (array_key_exists('error',$xmlData['apiresponse']))  continue;
                $data       = array();
                $data['Lorebook']['id']         = $item['Lorebook']['id'];
                $data['Lorebook']['itemid']     = $item['Lorebook']['itemid'];
                $data['Lorebook']['name']       = $xmlData['apiresponse']['item']['@name'];
                $data['Lorebook']['iconurl']    = $xmlData['apiresponse']['item']['@iconUrl'];
                debug($this->save($data));
                $i++;
                if ($i == 100) break;
            }
            return true;
        } else {
            return false;
        }
        return (false);
    }
}