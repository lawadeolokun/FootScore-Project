<?php

class Profile extends User {
    protected $firstName;
    protected $lastName;

    public function __construct($username, $password, $email, $firstName, $lastName) {
        parent::__construct($username, $password, $email);
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

}
