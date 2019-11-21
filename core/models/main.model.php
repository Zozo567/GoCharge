<?php

/*
    General page
*/
class Main extends GoCharge {

    function __construct(){

        self::$html_path = HTML_PATH .'/main.html';
    }

    public function read(){

        $this->readFormate();
    }

    private function readFormate(){

        $params['{{title}}'] = 'General page';

        $this->setParams($params);

        $point_model = $this->initModel('point');

        $points = $point_model->read();

    }


    protected function getMeta( $entity, $id, $is_single = true )
    {
        $db = $this->getDB();

        $sql = "SELECT * FROM ?n WHERE `Pid` = ?i";

        $rows = $db->getAll($sql, $entity.'_meta', $id);

        if( !$rows )
            return [];

        return $is_single ? $rows[0] : $rows;
    }
}