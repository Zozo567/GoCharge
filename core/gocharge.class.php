<?php

class GoCharge {

    protected static $model_name = null;
    protected static $method_name = null;

    private static $class_name = null;

    protected static $db = null;

    protected static $params = [];

    protected static $html_path = null;

    function __construct(){

        $model_name = 'main';

        $action = substr($_SERVER['REQUEST_URI'], 1);

        if( $action ) {
            if( stripos($action, '/') )
                $model_name = explode('/', $action)[0];
            else
                $model_name = $action;
        }

        self::$model_name = $model_name;

        $this->initialModel();

        $this->printHTML();

        exit;
    }

    private function initialModel(){

        if( file_exists(MODEL_PATH .'/'. self::$model_name . '.model.php') )
            require_once MODEL_PATH .'/'. self::$model_name . '.model.php';
        else
            die('Something went wrong');

        if( isset($_POST['action']) && !empty($_POST['action']) )
            $this->loadModel();
        else {
            $model = $this->getModel();
            $model->read();
        }
    }

    public function initModel( $model_name )
    {
        $model_path = MODEL_PATH . '/' . strtolower($model_name) . '.model.php';

        if (!file_exists($model_path))
            return null;

        $this->setClassName($model_name);

        if (class_exists($model_name))
            return new $model_name();

        require_once $model_path;

        return new $model_name();
    }

    private function loadModel(){

        $action = explode('/', $_POST['action']);
        self::$model_name = $action[0];
        self::$method_name = $action[1];

        if ($this->isAjax()) {

            if( !method_exists(self::$model_name, self::$method_name ) )
                die('Something went wrong');

            $return = $this->getModel()->{self::$method_name}();
            
            print json_encode($return);

            die();
            
        } else {

            if( !method_exists(self::$model_name, self::$method_name ) )
                die('Something went wrong');

            $this->getModel()->{self::$method_name}();
        }
    }

    private function getModel(){

        return new self::$model_name;
    }

    private function dbConnect(){

        require_once CORE_PATH.'/db.params.php';
        require_once CORE_PATH.'/db.class.php';

        $db_params = [
            'user' => DB_USER,
            'pass' => DB_PASS,
            'db' => DB_NAME,
        ];

        self::$db = new SafeMySQL($db_params);
    }

    public function getDB(){

        $this->dbConnect();

        return self::$db;
    }

    private function getHeader(){

        return HTML_PATH .'/header.html';
    }

    private function getFooter(){

        return HTML_PATH .'/footer.html';
    }

    protected function getBody(){

        return self::$html_path;
    }

    protected function getClassName()
    {
        return self::$class_name;
    }

    protected function setClassName( $class_name )
    {
        self::$class_name = $class_name;
    }

    protected function printHTML(){

        $html = file_get_contents($this->getHeader());

        $html .= file_get_contents($this->getBody());

        $html .= file_get_contents($this->getFooter());

        $params['{{title}}'] = 'Site';
            
        $this->setParams($params);
        
        print $this->mergeParams($html);
    }

    protected function setParams($params){

        self::$params += $params;
    }

    protected function mergeParams( $html ){

        if( !$html )
            return $html;

        if ($this->getParams())
            $html = str_replace(array_keys($this->getParams()), $this->getParams(), $html);
        
        return $html;
    }

    protected function getParams(){

        return self::$params;
    }

    protected function isAjax(){

        if( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
            return true;

        return false;
    }
}