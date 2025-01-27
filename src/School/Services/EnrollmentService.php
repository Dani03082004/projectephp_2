<?php 

    namespace App\School\Services;
    use App\School\Entities\Student;
    use App\School\Entities\Enrollment;
    use App\School\Entities\Course;
    use App\Infrastructure\Persistence\StudentRepository;
    use App\Infrastructure\Persistence\EnrollmentRepository;
    use App\School\Repositories\IEnrollmentRepository;  


    class EnrollmentService {

        private IEnrollmentRepository $enrollmentRepository;
    
        public function __construct(IEnrollmentRepository $enrollmentRepository) {
            $this->enrollmentRepository = $enrollmentRepository;
        }                 
    
        public function talktoEnrollment() {
            return $this->enrollmentRepository->allenrollment();
        }
    
        public function validateEnrollment(array $data) {
            if (empty($data['enrollment_date'])|| empty($data['student_name']) || empty($data['subject_name'])) {
                throw new \InvalidArgumentException("Para añadir una matrícula, todos los campos deben estar completos.");
            }
        }
    
        public function addenrollment(array $data, $db) {
            $this->validateEnrollment($data);
    
            $enrollment_date = new \DateTime($data['enrollment_date']);
            $enrollment = new Enrollment(
                $data['student_name'],
                $data['subject_name'],
                $enrollment_date,
            );
    
            $enrollmentRepo = new EnrollmentRepository($db);
            $enrollmentId = $enrollmentRepo->save($enrollment);
        }
    
    }