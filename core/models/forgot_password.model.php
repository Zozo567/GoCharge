<?php

class Forgot_password extends Main {

    protected static $model_name = null;
    protected static $method_name = null;

    private static $class_name = null;

    protected static $db = null;

    protected static $params = [];

    protected static $tpl_path = null;

    function __construct(){

        self::$tpl_path = TPL_PATH .'/forgot_password_modal.tpl';
    }

    public function read(){

        return $this->readFormate();
    }

    private function readFormate(){

        $html = file_get_contents(self::$tpl_path);
        
        return ['status' => true, 'content' => $this->mergeParams($html)];
    }
}