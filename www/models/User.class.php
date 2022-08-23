<?php

class User{

    private int $_id;
    private string $_firstname;
    private string $_lastname;
    private string $_email;
    private string $_password;
    private bool $_sex;

    public function __construct($id, $firstname, $lastname, $email, $password, $sex){
        $this->_id = $id;
        $this->_firstname = $firstname;
        $this->_lastname = $lastname;
        $this->_email = $email;
        $this->_password = $password;
        $this->_sex = $sex == 0 ? false : true;
    }

    public function getId(){return $this->_id;}
    public function getFirstname(){return $this->_firstname;}
    public function getLastname(){return $this->_lastname;}
    public function getEmail(){return $this->_email;}
    public function getPassword(){return $this->_password;}
    public function getSex(){return $this->_sex;}

}

?>