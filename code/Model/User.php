<?php

require_once TF_CODE_DIR . '/Model.php';
require_once TF_CODE_DIR . '/Model/User/Exception.php';

class Model_User extends Model {

    public static function checkLogin($login, $password) {
        return self::getOne("SELECT id FROM user WHERE login=? AND password=?", array($login, self::_getHashPassword($password)));
    }

    public static function getUser($userId) {
        return self::getRow("SELECT * FROM user WHERE id=?", array($userId));
    }

    public static function addUser() {
        global $langCfg;

        $data = array();
        $data['login'] = $_POST['login'];
        if ($data['login'] == '') {
            throw new Model_User_Exception($langCfg['emess']['reg_login_r']);
        }

        if (!preg_match('/[a-z0-9]/', $data['login'])) {
            throw new Model_User_Exception($langCfg['emess']['reg_login_s']);
        }

        if (strlen($data['login']) > 10) {
            throw new Model_User_Exception($langCfg['emess']['reg_login_l']);
        }

        if (self::getOne("SELECT id FROM user WHERE login=?", array($data['login']))) {
            throw new Model_User_Exception($langCfg['emess']['reg_login_o']);
        }

        $data['password'] = $_POST['password'];
        if ($data['password'] == '') {
            throw new Model_User_Exception($langCfg['emess']['reg_pass_r']);
        }

        if ($data['password'] != $_POST['c_password']) {
            throw new Model_User_Exception($langCfg['emess']['reg_c_pass']);
        }

        $data['password'] = self::_getHashPassword($data['password']);

        $data['firstname'] = $_POST['firstname'];
        if ($data['firstname'] == '') {
            throw new Model_User_Exception($langCfg['emess']['reg_fname_r']);
        }

        if (strlen($data['firstname']) > 30) {
            throw new Model_User_Exception($langCfg['emess']['reg_fname_l']);
        }

        $data['lastname'] = $_POST['lastname'];
        if ($data['firstname'] == '') {
            throw new Model_User_Exception($langCfg['emess']['reg_lname_r']);
        }

        if ($data['lastname'] > 30) {
            throw new Model_User_Exception($langCfg['emess']['reg_lname_l']);
        }

        if (!isset($_FILES['photo'])) {
            throw new Model_User_Exception($langCfg['emess']['reg_photo_r']);
        }

        $exts = array(
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif'
        );

        $file = getimagesize($_FILES['photo']['tmp_name']);

        if (!$file) {
            throw new Model_User_Exception($langCfg['emess']['reg_photo_i']);
        }

        if (!array_key_exists($file['mime'], $exts)) {
            throw new Model_User_Exception($langCfg['emess']['reg_photo_i']);
        }

        $data['photo'] = $exts[$file['mime']];
        
        self::insertArray('user', $data);
        $userId = self::checkLogin($data['login'], $_POST['password']);
        
        $filename = $userId . '.' . $data['photo'];
        
        move_uploaded_file($_FILES['photo']['tmp_name'], TF_ROOT_DIR . '/web/avatars/' . $filename);

        return $userId;
    }

    private static function _getHashPassword($password) {
        global $mainCfg;
        return md5($password . $mainCfg['salt']);
    }

}
