<?php

class test{

    public $users;
    private $passwords = [1 => 123, 2 => 321];
    protected $users_info = [1 => "Электрик", 2 => "Проводник"];

    function __construct()
    {
        $this->users  = [1 => "Вася", 2 => "Петя"];

    }


    public function get_users(){

        $tttt = "users";

        return $this->users;
    }


    private function getUserPass($user_n){

        return $this->passwords[$user_n];
    }



    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

}