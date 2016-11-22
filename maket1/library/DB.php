<?php
class DB
{
    private $connect_settings = [
                                      "host"  => "127.0.0.1"
                                    , "login" => "root"
                                    , "pass"  => ''
                                    , "db"    => "maket1"
                                ];

    private $db_connect;


    public function __construct($otherSettings = null)
    {
        if($otherSettings)
        {
            $this->connect_settings = $otherSettings;
        }
    }


    /**
     * Закрываем работу с бд
     */
    private function db_disconnect()
    {
        if($this->db_connect instanceof mysqli)
        {
            $this->db_connect->close();
            unset($this->db_connect);
        }
    }


    private function connect()
    {
//        if($this->db_connect && $this->db_connect->ping()){ return $this->db_connect; } //false
        if($this->db_connect instanceof mysqli && $this->db_connect->ping()){ return $this->db_connect; } //false

        $mysqli = new mysqli($this->connect_settings["host"], $this->connect_settings["login"], $this->connect_settings["pass"], $this->connect_settings["db"]);
        if($mysqli->connect_errno){
            exit($mysqli->connect_error);
        }

        $mysqli->set_charset("utf8");
        $this->db_connect = $mysqli;

        return $mysqli;
    }


    /**
     * Сделать запись в бд
     * @param $table - название таблицы
     * @param (array) $arr - данные для записи
     * @param bool|false $close - закрывать ли соединение с бд
     * @return mixed
     */
    public function insert($table, $arr, $close = false){

        $this->connect();

        $keys = array_keys($arr);
        $values = array_values($arr);

//        foreach ($values as $key => $value) {
//            $values[$key] = $this->db_connect->real_escape_string($value);
//        }
//        оно работает, но требует чтобы соединение с бд было активным! во время дебаггера, соединение успевает закрыться и потому возвращает пустой результат



        $resInsert = $this->db_connect->query("INSERT INTO ".$table." (".implode(",", $keys).") VALUES ('".implode("','", $values)."')");

        if(!$resInsert){
            $result["error"] = $this->db_connect->errno;
            $result["error_text"] = $this->db_connect->error;
        }

        $result["result"] = $resInsert;

        //закрываем соединение с бд
        if($close){ $this->db_disconnect(); }


        //response
        return $result;
    }


    /**
     * Метод для внесения правок в базу
     * @param $table -  название таблицы
     * @param $arr
     * @param $where
     * @param bool|false $close
     * @return mixed
     */
    public function update($table, $arr, $where, $close = false){

        $this->connect();

        $newArr = [];
        foreach($arr as $key => $value){
            $newArr[] = $key."='".$value."'";
        }

        $resdb = $this->db_connect->query("UPDATE ".$table." SET ".implode(",", $newArr). " WHERE ".$where);
        if(!$resdb){
            $result["error"] = $this->db_connect->connect_errno;
            $result["error_text"] = $this->db_connect->connect_error;
        }
        $result["result"] = $resdb;

        //закрываем соединение с бд
        if($close){ $this->db_disconnect(); }

        //response
        return $result;
    }


    public function delete($table, $where, $close = false){

        $this->connect();


        $resdb = $this->db_connect->query("DELETE FROM ".$table." WHERE ".$where);
        if(!$resdb){
            $result["error"] = $this->db_connect->connect_errno;
            $result["error_text"] = $this->db_connect->connect_error;
        }
        $result["result"] = $resdb;

        //закрываем соединение с бд
        if($close){ $this->db_disconnect(); }

        //response
        return $result;
    }


    public function select($sql, $close = false){

        $this->connect();


        $resdb = $this->db_connect->query($sql);
        if(!$resdb){
            $result["error"] = $this->db_connect->connect_errno;
            $result["error_text"] = $this->db_connect->connect_error;
        }
        else if($resdb->num_rows == 0)
        {
            $result["error"] = 1;
            $result["error_text"] = "no items";
        }
        else
        {
            $result["result"] = $resdb->fetch_all(MYSQLI_ASSOC);
        }

        //закрываем соединение с бд
        if($close){ $this->db_disconnect(); }

        //response
        return $result;
    }



}