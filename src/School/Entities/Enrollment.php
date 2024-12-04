<?php
    namespace App\School\Entities;

    class Enrollment{
        private int $id;
        private Student $student;
        private Course $course;
        private ?Subject $subject;
        private \DateTime $enrollmentDate;

        public function __construct(int $id, Student $student, Course $course, ?Subject $subject, DateTime $enrollmentDate){
                $this->id = $id;
                $this->student = $student;
                $this->course = $course;
                $this->subject = $subject;
                $this->enrollmentDate = $enrollmentDate;
        }
        
        public function getId() {
                return $this->id;
        }
        
        public function getStudent(): Student {
                return $this->student;
        }
        
        public function setStudent(Student $student): self {
                $this->student = $student;
                return $this;
        }
        
        public function getCourse(): Course {
                return $this->course;
        }
        
        public function setCourse(Course $course): self {
                $this->course = $course;
                return $this;
        }
        
        public function getSubject(): ?Subject {
                return $this->subject;
        }
        
        public function setSubject(?Subject $subject): self{
                $this->subject = $subject;
                return $this;
        }
        
        public function getEnrollmentDate(): DateTime {
                return $this->enrollmentDate;
        }
        
        public function setEnrollmentDate(DateTime $date){
                $this->enrollmentDate = $date;
                return $this;
        }
    }