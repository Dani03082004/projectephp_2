<?php
    namespace App\School\Entities;

    class Enrollment{
        private int $id;
        private int $student_id;
        private int $subject_id;
        private \DateTime $enrollment_date;
        private int $course_id;

        public function __construct(int $student_id, int $subject_id, DateTime $enrollment_date, int $course_id){
                $this->student_id = $student_id;
                $this->subject_id = $subject_id;
                $this->enrollment_date = $enrollment_date;
                $this->course_id = $course_id;
        }
        
        public function getId() {
                return $this->id;
        }
        
        public function getStudent_id(){
                return $this->student_id;
        }
        
        public function setStudent_id(int $student_id) {
                $this->student_id = $student_id;
                return $this;
        }
        
        public function getCourse_id() {
                return $this->course_id;
        }
        
        public function setCourse_id(int $course_id){
                $this->course_id = $course_id;
                return $this;
        }
        
        public function getSubject_id(){
                return $this->subject_id;
        }
        
        public function setSubject_id(int $subject_id){
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