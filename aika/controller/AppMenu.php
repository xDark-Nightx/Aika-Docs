<?php

namespace Aika\Controller;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("Session.php");

class AppMenu{
    private $session;

    private $items;

    public function __construct(){
        $this->session = Session::GetInstance();
        $this->initializeContent();
    }

    private function initializeContent(){
        $result = $this->session->db->select(
            "SELECT * FROM Types WHERE `Status` > 0"
        );
    }

    public function Render(){
        print "";
    }
}

?>