<?php

class Session {

    private $user_id;
    public $username;
    private $last_login;
    public $status;

    public const MAX_LOGIN_AGE = 60*60*2; // 1 day

    public function __construct() {
        session_start();
        $this->check_stored_login();
    }

    public function login($user) {
        if($user) {
            // prevent session fixation attacks
            session_regenerate_id();
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->username = $_SESSION['username'] = $user->first_name;
            $this->status = $_SESSION['status'] = $user->status;
            $this->last_login = $_SESSION['last_login'] = time();
        }
        return true;
    }

    public function is_logged_in() {
        // return isset($this->user_id);
        return isset($this->user_id) && $this->last_login_is_recent();
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['last_login']);
        unset($_SESSION['status']);
        unset($this->user_id);
        unset($this->username);
        unset($this->last_login);
        unset($this->status);
        return true;
    }

    private function check_stored_login() {
        if(isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->username = $_SESSION['username'];
            $this->last_login = $_SESSION['last_login'];
            $this->status = $_SESSION['status'];
        }
    }

    private function last_login_is_recent() {
        if(!isset($this->last_login)) {
            return false;
        } elseif(($this->last_login + self::MAX_LOGIN_AGE) < time()) {
            return false;
        } else {
            return true;
        }
    }

    public function get_logged_in_user(){
        if ($this->is_logged_in()){
            return User::find_by_id($this->user_id);
        }else{
            return false;
        }
    }


    public function message($msg = "", $type = 'message'){
        if (!empty($msg)){
            $_SESSION['message'] = $msg;
            $_SESSION['message_type'] = $type;
            return true;
        }else{
            return [ $_SESSION['message_type']  => $_SESSION['message'] ?? '']  ;
        }
    }

    public function clear_message(){
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }


    public function display_session_message(){

        if (isset($_SESSION['message_type']) && isset($_SESSION['message'])){
            $msgArr = $this->message();
            $type = array_keys($msgArr)[0];
            $msg =  array_values($msgArr)[0];
            switch ($type){
                case "error":
                    $this->clear_message();
                        return "<div class=\"alert alert-danger  alert-dismissible fade show\" role=\"alert\"> ${msg} <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                  </button></div>";
                    break;
                case "message":
                    $this->clear_message();
                    return "<div class=\"alert alert-info  alert-dismissible fade show\" role=\"alert\"> ${msg}<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                  </button> </div>";
                    break;
                case "success":
                    $this->clear_message();
                    return "<div class=\"alert alert-success  alert-dismissible fade show\" role=\"alert\"> ${msg} <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                  </button></div>";
                    break;
            }


        }

        return "";

    }

}