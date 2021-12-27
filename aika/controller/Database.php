<?php

namespace Aika\Controller;

defined('__PROJECT_DIR__') or define('__PROJECT_DIR__', $_SERVER['DOCUMENT_ROOT']);
require_once(__PROJECT_DIR__."/resources/config.php");

use \PDO;

class DataBase {
    private $connection;

    function connect(){
        global $config;

        try {
            if (!isset($config['db']['sql'])){
                return false;
            }

            $credentials = $config['db']['sql'];

            $this->connection = new PDO("mysql:server = {$credentials['host']} ; {$credentials['connectionInfo']}", 
            $credentials['username'], $credentials['password']);

            return true;
        } catch (PDOException $e) {
            print "[Could not connect to MySQL Server] -> error: {$e->getMessage()}\n";
            return false;
        }
    }

    function select($query, $fetchAll = true){
        if (!$this->connect()){
            return false;
        }

        try{
            $stmt = $this->connection->query($query);

            if ($stmt === false){
                return false;
            }

            if ($fetchAll){
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            }

            return $result;
        } catch (Exception $exception){
            print "[Could not execute query] -> error: {$exception->getMessage()}\n";
            return false;
        }
    }

    public function update($tableName, $fieldData, $conditions){
        if (!$this->connect()){
            return false;
        }

        try{
            $firstItem['value'] = reset($fieldData);

            if($firstItem['value'] === false){
                return false;
            }

            $firstItem['key'] = key($fieldData);

            if($firstItem['value'] === null){
                $updateFields = "`{$firstItem['key']}` = NULL";
            } else {
                $filteredValue = str_replace("'", "&#39;", $firstItem['value']); 

                $updateFields = "`{$firstItem['key']}`='{$filteredValue}'";
            }

            array_shift($fieldData);

            foreach ($fieldData as $key=>$value){
                if ($value === null){
                    $updateFields .= ', `'.$key."` = NULL";
                } else {
                    $filteredValue = str_replace("'", "&#39;", $value);
                    $updateFields .= ', `'.$key."`='".$filteredValue."'";
                }
            }

            $queryString = "UPDATE ".$tableName." SET ".$updateFields." WHERE ".$conditions;

            $result = $this->connection->exec($queryString);

            if ($result === false){
                print $queryString;
                return false;
            } else {
                return $result;
            }
        } catch (Exception $exception){
            print "[Could not execute query] -> error: {$exception->getMessage()}\n";
            return false;
        }
    }

    public function insert($tableName, $data){
        if (!$this->connect()){
            return false;
        }

        try {
            $firstItem['value'] = reset($data);

            if($firstItem['value'] === false){
                return false;
            }

            $firstItem['key'] = key($data);

            array_shift($data);

            $keys = "`".$firstItem['key']."`";

            if ($firstItem['value'] == null){
                $values = ", NULL";
            } else {
                $filteredValue = str_replace("'", "&#39;", $firstItem['value']);
                $values = "'".$filteredValue."'";
            }

            foreach ($data as $fieldName => $fieldValue){
                if (empty($fieldName)){
                    continue;
                }

                $keys .= ', `'.$fieldName."`";

                if ($fieldValue == null){
                    $values .= ", NULL";
                } else {
                    $filteredValue = str_replace("'", "&#39;", $fieldValue);
                    $values .= ", '".$filteredValue."'";
                }   
            }

            $sql_stmt = "INSERT INTO ".$tableName." (".$keys.") VALUES (".$values.")";

            $stmt = $this->connection->prepare($sql_stmt);

            if (!$stmt){
                return false;
            }

            if (!$stmt->execute()){
                print $sql_stmt;
                return false;
            }

            $lastIndex = $this->connection->lastInsertId();

            if (!$lastIndex){
                var_dump($this->connection->errorInfo());
                return false;
            }
            
            return $lastIndex;
        } catch (Exception $exception){
            print "[Could not execute query] -> error: {$exception->getMessage()}\n";
            return false;
        }
    }

    public function replace($tableName, $data){
        if (!$this->connect()){
            return false;
        }

        try {
            $firstItem['value'] = reset($data);

            if($firstItem['value'] === false){
                return false;
            }

            $firstItem['key'] = key($data);

            array_shift($data);

            $keys = "`".$firstItem['key']."`";
            $values = "'".$firstItem['value']."'";

            foreach ($data as $fieldName => $fieldValue){
                if (empty($fieldName)){
                    continue;
                }

                $keys .= ', `'.$fieldName."`";
                $values .= ", '".$fieldValue."'";
            }

            $sql_stmt = "REPLACE INTO ".$tableName." (".$keys.") VALUES (".$values.")";

            $stmt = $this->connection->prepare($sql_stmt);

            if (!$stmt){
                return false;
            }

            if ($stmt->execute() === false){
                print '<h5>';
                var_dump($this->connection->errorInfo);
                print '</h5>';
                $this->connection->Close;
                return false;
            }

            $this->connection->Close;

            return true;
        } catch (Exception $exception){
            print "[Could not execute query] -> error: {$exception->getMessage()}\n";
            return false;
        }
    }


    public function delete($tableName, $index_fieldname, $index){
        if (!$this->connect()){
            return false;
        }

        try{
            $queryString = "DELETE FROM [Vinhedo].[{$tableName}] WHERE [{$index_fieldname}] = ".$index;

            $result = $this->connection->exec($queryString);

            if (!$result){
                print '<h5>';
                var_dump($this->connection->errorInfo());
                print '</h5>';
            }

            return $result;
        } catch (Exception $exception){
            return self::ErrorLogToFile($exception);
        }
    }
}


?>