<?php

require_once TF_CODE_DIR . '/Model/User.php';

class Controller_Main extends Controller {

    public function loginAction() {
        if (isset($_POST['login'])) {
            global $langCfg;

            $data = array(
                'status' => 'OK',
                'error' => ''
            );

            $login = $_POST['login'];
            $password = $_POST['password'];
            
            $userId = Model_User::checkLogin($login, $password);
            if ( !$userId ) {
                $data['status'] = 'ERR';
                $data['error'] = $langCfg['emess']['notlogin'];
            } else {
                $_SESSION['user_id'] = $userId;
            }

            echo json_encode($data);
            exit;
        }
    }

    public function regAction() {
        if ( isset($_POST['login']) ) {
            try {
                $_SESSION['user_id'] = Model_User::addUser();
                
                header("Location: /");
                exit;
            } catch (Model_User_Exception $e) {
                $this->_addPar('error', $e->getMessage());
            }
        }
    }

    public function mainAction() {
        if ( !isset($_SESSION['user_id']) ) {
            header("Location: /");
            exit;
        }
        
        $this->_addPar('user', Model_User::getUser($_SESSION['user_id']));
    }

    public function run($action) {
        if (isset($_GET['logout'])) {
            unset($_SESSION['user_id']);
        }
        
        // проверка на залогиненного пользователя
        if (isset($_SESSION['user_id'])) {
            parent::run('main');
        } else {
            parent::run($action);
        }
    }
}
