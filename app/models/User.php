<?php

class User{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getUsers(){
        $this->db->query('SELECT * FROM users');

        $results = $this->db->resultSet();

        return $results;
    }
    public function getUserById($userId) {
        $this->db->query('SELECT * FROM users WHERE userId = :userId');
        $this->db->bind(':userId', $userId);

        $row = $this->db->single();
        return $row;

    }

    public function signup($data){
        $this->db->query('INSERT INTO users (firstName, surname, email, password, activationHash) VALUES ( :firstName, :surname, :email, :password, :activationHash)');

        //Bind query
        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':surname', $data['surname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':activationHash', $data['activationHash']);

        //Execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function resendActivateLink($email, $activationHash){
        $this->db->query('UPDATE users SET activationHash = :activationHash  WHERE email = :email');

        //Bind query
        $this->db->bind(':email', $email);
        $this->db->bind(':activationHash', $activationHash);
       
        //Execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function activateUser($email, $isValid=1){
        $this->db->query('UPDATE users SET isValidated = :isValid  WHERE email = :email');

        //Bind query
        $this->db->bind(':email', $email);
        $this->db->bind(':isValid', $isValid);
       
        //Execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    //Login User
    public function login($email, $password){
        $this->db->query('SELECT * FROM users WHERE email = :email AND isValidated = :vId');
        $this->db->bind(':email', $email);
        $this->db->bind(':vId', 1);

        $row = $this->db->single();

        $hashPassword = $row->password;
        
        if(password_verify($password,$hashPassword)){
            return $row;
        } else {
            false;
        }
    }
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkActivationHash($activationHash){
        $this->db->query('SELECT * FROM users WHERE activationHash = :activationHash');
        $this->db->bind(':activationHash', $activationHash);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmailValidation($email){
        $this->db->query('SELECT * FROM users WHERE email = :email AND isValidated = :vId');
        $this->db->bind(':email', $email);
        $this->db->bind(':vId', 1);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function resetPassLink($email, $resetHash){
        $this->db->query('UPDATE users SET resetHash = :resetHash  WHERE email = :email AND isValidated = :isValid');

        //Bind query
        $this->db->bind(':email', $email);
        $this->db->bind(':resetHash', $resetHash);
        $this->db->bind(':isValid', 1);
       
        //Execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function checkResetHash($resetHash){
        $this->db->query('SELECT * FROM users WHERE resetHash = :resetHash');
        $this->db->bind(':resetHash', $resetHash);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function resetPassword($email, $password){
        $this->db->query('UPDATE users SET password = :password WHERE isValidated = :isValid AND email = :email');

        //Bind query
        $this->db->bind(':password', $password);
        $this->db->bind(':email', $email);
        $this->db->bind(':isValid', 1);
       
        //Execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getSomeUserData() {
        
    }
    public function updateUser($data, $isValid=1){
        $this->db->query('UPDATE users SET firstName = :firstName, surname = :surname, email =  :newEmail, phonePrimary = :phone WHERE isValidated = :isValid AND email = :email');

        //Bind query
        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':surname', $data['surname']);
        $this->db->bind(':phonePrimary', $data['phone']);
        $this->db->bind(':newEmail', $data['newEmail']);
        $this->db->bind(':email', $email);
        $this->db->bind(':isValid', $isValid);
       
        //Execute query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}