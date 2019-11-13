<?php

class Point extends Main {

    protected static $model_name = null;
    protected static $method_name = null;

    private static $class_name = null;

    protected static $db = null;

    protected static $params = [];

    protected static $html_path = null;

    function __construct(){

        // self::$html_path = HTML_PATH .'/main.html';

        $model_name = 'point';

        self::$model_name = $model_name;
    }

    public function read(){

        return $this->readFormate();
    }

    private function readFormate(){

        $db = $this->getDB();

        $points = $db->getAll("SELECT * FROM ?n", 'point');
        
        return $points;
    }
}