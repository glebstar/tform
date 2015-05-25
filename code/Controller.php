<?php

class Controller {

    private $_template = 'login';
    private $_pars = array();

    public function run($action) {
        if (!method_exists($this, $action . 'Action')) {
            $action = 'e404';
        }

        $this->_template = $action;

        $action = $action . 'Action';
        $this->$action();
        $this->_render();
    }

    public function e404Action() {
        
    }

    private function _render() {
        global $lang;
        global $langCfg;
        
        require_once TF_CODE_DIR . '/View/layout.php';
        exit;
    }

    protected function _addPar($name, $value) {
        $this->_pars[$name] = $value;
    }
}
