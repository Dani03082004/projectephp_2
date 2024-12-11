<?php
    namespace App\School\Entities;

    class Enrollment{
        private int $id;
        private Student $student_id;
        private ?Subject $subject_id;
        private \DateTime $enrollment_date;
        private Course $course_id;

        public function __construct(int $id, Student $student_id, ?Subject $subject_id, DateTime $enrollment_date, Course $course_id){
                $this->id = $id;
                $this->student_id = $student_id;
                $this->subject_id = $subject_id;
                $this->enrollment_date = $enrollment_date;
                $this->course_id = $course_id;
        }
        
        public function getId() {
                return $this->id;
        }
        
        public function getStudent_id(): Student {
                return $this->student_id;
        }
        
        public function setStudent_id(Student $student_id): self {
                $this->student_id = $student_id;
                return $this;
        }
        
        public function getCourse_id(): Course {
                return $this->course_id;
        }
        
        public function setCourse_id(Course $course_id): self {
                $this->course_id = $course_id;
                return $this;
        }
        
        public function getSubject_id(): ?Subject {
                return $this->subject_id;
        }
        
        public function setSubject_id(?Subject $subject_id): self{
                $this->subject_id = $subject_id;
                return $this;
        }
        
        public function getEnrollment_Date(): DateTime {
                return $this->enrollmentDate;
        }
        
        public function setEnrollment_Date(DateTime $date){
                $this->enrollment_date = $date;
                return $this;
        }
    }