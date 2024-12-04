<?php

    namespace App\School\Entities;

     class User{
        private string $email;
        private string $username;
        private string $password;
        private string $dni;
        private ?\DateTime $createdAt=null;
        private ?\DateTime $updatedAt=null;

        function __construct($username,$email,$password,$dni){
            $this->email=$email;
            $this->username=$username;
            $this->password=$password;
            $this->dni=$dni;
        }

        function setEmail(string $email){
            $this->email=$email;
            return $this;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getUsername(){
            return $this->username;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getDni(){
            return $this->dni;
        }

        public function setUsername($username){
            $this->username = $username;
            return $this;
        }

        public function setPassword($password){
            $this->password = $password;
            return $this;
        }

        public function setDni($dni){
            $this->dni = $dni;
            return $this;
        }
    }