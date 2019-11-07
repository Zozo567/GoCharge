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
}