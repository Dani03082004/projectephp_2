<?php

namespace App\School\Entities;

class User{
    private int $id;
    private string $uuid;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $password;
    private string $user_type;

    public function __construct($uuid, $first_name, $last_name, $email, $password, $user_type){
        $this->uuid = $uuid;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->user_type = $user_type;
    }

    public function setEmail(string $email){
        $this->email = $email;
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

    public function getUuid(){
        return $this->uuid;
    }

    public function setUuid(string $uuid){
        $this->uuid = $uuid;
        return $this;
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function setFirstName(string $first_name){
        $this->first_name = $first_name;
        return $this;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function setLastName(string $last_name){
        $this->last_name = $last_name;
        return $this;
    }

    public function getUser_type(){
        return $this->user_type;
    }

    public function setUser_type($user_type){
        $this->user_type = $user_type;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }
}
