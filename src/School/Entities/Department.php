<?php 

    namespace App\School\Entities;

    class Department{
        protected $name;

        function __construct($name){
            $this->name=$name;
        }

        public function getName(){
            return $this->name;
        }
}