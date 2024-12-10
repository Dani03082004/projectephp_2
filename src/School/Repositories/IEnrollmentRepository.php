<?php 

namespace App\School\Repositories;

use App\School\Entities\Enrollment;

interface IEnrollmentRepository{
    public function save(Enrollment $enrollment);
    public function findById($id);

}