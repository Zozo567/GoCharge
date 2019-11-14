<?php

class Settings extends Main {

    protected static $model_name = null;
    protected static $method_name = null;

    private static $class_name = null;

    protected static $db = null;

    protected static $params = [];

    protected static $tpl_path = null;

    function __construct(){

        self::$tpl_path = TPL_PATH .'/settings_modal.tpl';
    }

    public function read(){

        return $this->readFormate();
    }

    private function readFormate(){

        $html = file_get_contents(self::$tpl_path);
        
        // return ['status' => tru]$this->mergeParams($html);
        return ['status' => true, 'content' => $this->mergeParams($html)];
    }
}