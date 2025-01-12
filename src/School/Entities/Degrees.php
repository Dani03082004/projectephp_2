<?php

    namespace App\School\Entities;

    use App\School\Entities\Degrees;

    class Degrees{
        protected int $id;
        protected string $name;
        protected string $duration_years;

        function __construct(string $name, string $duration_years){
            $this->name = $name;
            $this->duration_years=$duration_years;
        }
        
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $this;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($name){
            $this->name = $name;
            return $this;
        }

        public function getDuration_years(){
            return $this->duration_years;
        }

        public function setDuration_years($duration_years){
            $this->duration_years = $duration_years;
            return $this;
        }
}