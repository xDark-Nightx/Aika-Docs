<?php

namespace Aika\Controller;

if (empty(session_id()) || !session_id()){
    session_start();
}

require_once("Database.php");

class Session {
    public $db;

    //private $userData;
    //public $currentUser;
    public $isLoggedIn;

    public function __construct($fromSession = false){
        if (!$fromSession){
            $this->isLoggedIn = false;
        } else {
            $this->isLoggedIn = $_SESSION['isLoggedIn'];
            //$this->userData = $_SESSION['userData'];

            //$this->currentUser = new User($this->userData);
        }
        
        $this->db = new DataBase();
    }

    public function saveToSession(){
        $_SESSION['isLoggedIn'] = $this->isLoggedIn;
        //$_SESSION['userData'] = $this->userData;
    }

    public static function GetInstance(){
        if (!isset($_SESSION['isLoggedIn'])){
            return new Session();
        } else {
            return new Session(true);
        }
    }

    public function requirePermission($permissionId){
        if ($this->isLoggedIn){
            return $this->currentUser->requirePermission($permissionId);
        } else {
            return false;
        }
    }
}

?>