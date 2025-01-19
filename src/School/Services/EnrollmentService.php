<?php 

    namespace App\School\Services;
    use App\School\Entities\Student;
    use App\School\Entities\Course;
    use App\Infrastructure\Persistence\StudentRepository;
    use App\Infrastructure\Persistence\EnrollmentRepository;

    class EnrollmentService {

        private EnrollmentRepository $enrollmentRepository;
    
        public function __construct(EnrollmentRepository $enrollmentRepository) {
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
                $enrollment_date,
                $data['student_name'],
                $data['subject_name']
            );
    
            $enrollmentRepo = new EnrollmentRepository($db);
            $enrollmentId = $enrollmentRepo->save($enrollment);
        }
    
    }