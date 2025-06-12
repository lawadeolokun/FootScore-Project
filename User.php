<?php

//USER
class User {
    protected $username;
    protected $password;
    protected $email;

    public function __construct($username, $password, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function authenticate($inputUsername, $inputPassword, $emailInput) {
        return ($inputUsername === $this->username && $inputPassword === $this->password && $emailInput === $this->email);
    }
}
