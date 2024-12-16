<?php

namespace App\School\Entities;

abstract class User{
    private string $uuid;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $password;
    private string $dni;
    private ?\DateTime $createdAt = null;
    private ?\DateTime $updatedAt = null;

    public function __construct($uuid, $first_name, $last_name, $email, $password, $dni){
        $this->uuid = $uuid;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->dni = $dni;
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

    public function getDni(){
        return $this->dni;
    }

    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

    public function setDni($dni){
        $this->dni = $dni;
        return $this;
    }

    public function getUuid(): string{
        return $this->uuid;
    }

    public function setUuid(string $uuid): self{
        $this->uuid = $uuid;
        return $this;
    }

    public function getFirstName(): string{
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self{
        $this->first_name = $first_name;
        return $this;
    }

    public function getLastName(): string{
        return $this->last_name;
    }

    public function setLastName(string $last_name): self{
        $this->last_name = $last_name;
        return $this;
    }
}
