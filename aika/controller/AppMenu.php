<?php

namespace Aika\Controller;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("Session.php");

class AppMenu{
    private $session;

    private $items;
    private $itemId;
    private $itemType; /* 1: Types | 2: Packets */

    public function __construct(){
        $this->session = Session::GetInstance();
        $this->initializeContent();
    }

    private function initializeContent(){
        $id = $_GET['Id'] ?? false;

        if (!is_numeric($id)){
            $id = false;
        }

        $this->itemId = $id;

        $typeId = $_GET['Type'] ?? false;

        if (!is_numeric($typeId)){
            $typeId = false;
        }

        $this->itemType = $typeId;

        try{
            $result = $this->session->db->select(
                "SELECT * FROM Types WHERE `Status` > 0"
            );
    
            if ($result === false || empty($result)){
                $this->items['Types'] = false;
            } else {
                $this->items['Types'] = $result;
            }
        } catch(Exception $exception){
            $this->items['Types'] = false;
            return;
        }

        
    }

    public function Render(){
        var_dump($this->items['Types']);
    }
}

?>