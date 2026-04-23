<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author VANESSA
 */
class Database {

    public $con;
    private $sql;
    private $array;
    private $NUM_EXEC_QUERY = 0;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->NUM_EXEC_QUERY++;

        if($this->con instanceof mysqli){
            return;
        }

        $this->con = new mysqli(DB_HOSTNAME, DB_USER, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
//        $this->con->set_charset(DB_CHARSET);
    }

    public function getNumberQuery() {
        return $this->NUM_EXEC_QUERY;
    }

    private function close() {
        $this->con->close();
        $this->con = null;
    }

    public function select($table, $campos = "*", $where = "") {
        $this->connect(); //abre uma conexão

        $this->sql = "SELECT {$campos} FROM  {$table} {$where}";
        if ($result = $this->con->query($this->sql)) {
            for ($this->array = array(); $row = $result->fetch_assoc(); $this->array[] = $row);
            $result->close();
        }

        $this->close(); //fecha conexão
        return $this->array;
    }

    public function update($table, $campos, $where) {
        $this->connect(); //abre uma conexão

        $this->sql = "UPDATE {$table} SET {$campos} WHERE {$where}";
        if ($this->con->query($this->sql)) {
            $resp = true;
        }else{
            $resp = false;
        }
        
        $this->close(); //fecha conexão
        return $resp;
    }

    public function exec_query($query) {
        $this->connect(); //abre uma conexão

        $this->sql = $query;
        if ($this->con->query($this->sql)) {
            $this->close(); //fecha conexão
            return true;
        }

        $this->close(); //fecha conexão
        return false;
    }
    public function exec_query_dados($query) {
        $this->connect(); //abre uma conexão

        $this->sql = $query;
        if ($result = $this->con->query($this->sql)) {
            for ($this->array = array(); $row = $result->fetch_assoc(); $this->array[] = $row);
            $result->close();
        }

        $this->close(); //fecha conexão
        return $this->array;
    }

    public function delete($table, $where) {
        $this->connect(); //abre uma conexão
        $this->sql = "DELETE FROM {$table} WHERE {$where}";

        if ($this->con->query($this->sql)) {
            $this->close(); //fecha conexão
            return true;
        }

        $this->close(); //fecha conexão
        return false;
    }

    public function insert($table, $keys = array(), $values = array()) {
        $this->connect(); //abre uma conexão
        $true = false;

        $campos = implode(",", $keys);
        $valores = "'";
        $valores .= implode("','", $values) . "'";

        $this->sql = "INSERT INTO {$table}  (" . $campos . ") VALUES  ({$valores})";

        if ($result = $this->con->query($this->sql)) {
            $true = true;
        } else {
            $true = false;
            //echo 'Error' . mysqli_error($this->con);
        }
        $this->close(); //fecha conexão
        return $true;
    }

    public function insert_id($table, $keys = array(), $values = array()) {
        $this->connect(); //abre uma conexão
        $true = false;

        $campos = implode(",", $keys);
        $valores = "'";
        $valores .= implode("','", $values) . "'";

        $this->sql = "INSERT INTO {$table}  (" . $campos . ") VALUES  ({$valores})";

        if ($this->con->query($this->sql)) {
            $true = true;
        } else {
            $true = false;
            //echo 'Error' . mysqli_error($this->con);
        }
        
        $true = mysqli_insert_id($this->con);
        $this->close(); //fecha conexão
        return $true;
    }
}
