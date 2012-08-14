<?php

class LotroAPIComponent extends Component {

    protected $_config          = null;
    protected $_worldname       = "vanyar";
    protected $_apiPath         = "http://data.lotro.com/";

    public function __construct() {
        App::import('Model', 'Config');
        $this->_config = new Config();
        $config = $this->_config->find('first');
        $this->_apiPath    .= $config['Config']['developer_name'] . "/" . $config['Config']['api_key'];
    }

    public function setWorld($worldname) {
        $this->_worldname   = $worldname;
    }

    public function getCharacterData($charactername = null) {
        if (is_null($charactername)) return false;
        $this->_apiPath .= "/charactersheet/w/" . $this->_worldname . "/c/" . strtolower($charactername) . "/";
        $xml    = Xml :: toArray(Xml :: build($this->_apiPath));
        return $xml;
    }

    public function getItemData($itemId = null) {
        if (is_null($itemId))   return false;
        $this->_apiPath .= "/item/id/" . $itemId . "/";
        $xml    = Xml :: toArray(Xml :: build($this->_apiPath));
        return $xml;
    }

}