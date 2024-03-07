<?php
class User{
    private $username;
    private $password;
    public $email;
    private $role;

    public function registerUser($un, $pwd, $email, $role){
        $this->username = "$un";
        $this->username = "$pwd";
        $this->username = "$email";
        $this->username = "$role";
        
    }
}