<?php

namespace App\School\Services;
use App\School\Entities\Teacher;
use App\Infrastructure\Persistence\TeacherRepository;
use App\School\Entities\User;  
use App\Infrastructure\Persistence\UserRepository;  
use App\School\Repositories\ITeacherRepository;  


// Utilizar Servicio para comprobaciones y llamar vista (comunicarse con el Repo para poder traer ciertas cosas)

class TeacherService{

    private ITeacherRepository $TeacherRepository;

    public function __construct(ITeacherRepository $TeacherRepository){
        $this->TeacherRepository=$TeacherRepository;
    }

// Validar datos (hacer comprobaciones formulario) --> ControladorTeacher
    public function talktorepo(){
        return $this->TeacherRepository->allteachers();
    }

    public function validateTeacher(){
        $data = $_POST;

        if (empty($data['first_name']) || empty($data['last_name']) ||
            empty($data['email']) || empty($data['password']) || empty($data['departamento'])) {
                throw new \InvalidArgumentException("Para añadir un nuevo profesor, usted tiene que completar todos los campos.");
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("El correo electrónico que has puesto, es inválido, por favor diposite uno nuevo.");
        }
    }

    public function addteacher(array $data, $db){

        // Validaciones
        $this->validateTeacher($data);

        $uuid = uniqid('', true); 
        $user = new User (
            $uuid,
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['password'],
            'teacher'
        );

        // Guardamos el User en la BD
        $userepository = new UserRepository($db);
        $userid = $userepository->save($user);

        $teacher = new Teacher(
            $uuid,
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['password'],
            'teacher', 
            $userid,
            $data['departamento']
        );

        // Guardar al profesor en la BD
        $teacherRepo = new TeacherRepository($db);
        $teacherRepo->save($teacher);
    }
}




