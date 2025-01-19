<?php

namespace App\School\Entities;

use DateTime;

class Exams {
    private int $id;
    private int $subject_id;
    private ?DateTime $exam_date = null;
    private string $description;

    function __construct(int $subject_id, ?DateTime $exam_date = null, string $description) {
        $this->subject_id = $subject_id;
        $this->exam_date = $exam_date;
        $this->description = $description;
    }

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
        return $this;
    }

    public function getSubjectId(){
        return $this->subject_id;
    }

    public function setSubjectId(int $subject_id){
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

    public function getExamDate() : DateTime{
        return $this->exam_date;
    }

    public function setExamDate($exam_date){
        $this->exam_date = $exam_date;
        return $this;
    }

}
