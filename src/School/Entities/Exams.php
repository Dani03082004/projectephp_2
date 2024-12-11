<?php

namespace App\School\Entities;

use DateTime;

class Exams {
    private int $id;
    private Subject $subject_id;
    private ?DateTime $exam_date = null;
    private string $description;
    private Degrees $degree_id;

    function __construct(int $id, Subject $subject_id, ?DateTime $exam_date = null, string $description, Degrees $degree_id) {
        $this->id = $id;
        $this->subject_id = $subject_id;
        $this->exam_date = $exam_date;
        $this->description = $description;
        $this->degree_id = $degree_id;
    }

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
        return $this;
    }

    public function getSubjectId(): Subject{
        return $this->subject_id;
    }

    public function setSubjectId(Subject $subject_id): self{
        $this->subject_id = $subject_id;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription(string $description){
        $this->description = $description;
        return $this;
    }

    public function getExamDate() {
        return $this->exam_date;
    }

    public function setExamDate(?DateTime $exam_date){
        $this->exam_date = $exam_date;
        return $this;
    }

    public function getDegree_id(): Degrees{
        return $this->degree_id;
    }

    public function setDegree_id(Degrees $degree_id): self{
        $this->degree_id = $degree_id;
        return $this;
    }
}
