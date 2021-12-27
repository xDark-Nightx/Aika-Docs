<?php

namespace Aika\Controller;

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

$appMenu = new AppMenu();
$appMenu->Render();

?>