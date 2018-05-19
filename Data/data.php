<?php

class Data {

    public $server;
    public $user;
    public $password;
    public $db;
    public $connection;
    public $isActive;

    /* constructor */

    public function Data() {
        $this->server = "127.0.0.1";
        $this->user = "root";
        $this->password = "";
        $this->db = "unagrupo3";

    }
    public function getServer(){
        return $this->server;
    }
     public function getUser(){
        return $this->user;
    }

    public function getPass(){
        return $this->password;
    }

    public function getDbName(){
        return $this->db;
    }



}
