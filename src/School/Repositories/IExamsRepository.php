<?php

namespace App\School\Repositories;
use App\School\Entities\Exams;

    interface IExamsRepository{
        public function save(Exams $exams);
        public function findById($id);
        
    }
    