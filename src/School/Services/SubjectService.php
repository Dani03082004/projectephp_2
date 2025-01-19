<?php

namespace App\School\Services;

use App\School\Entities\Subject;
use App\Infrastructure\Persistence\SubjectRepository;

class SubjectService {

    private SubjectRepository $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository) {
        $this->subjectRepository = $subjectRepository;
    }

    public function talktosubject() {
        return $this->subjectRepository->allsubjects();
    }

    public function validateSubject(array $data) {
        if (empty($data['name']) || empty($data['curso'])) {
            throw new \InvalidArgumentException("Para añadir una nueva asignatura, todos los campos deben estar completos");
        }
    }

    public function addSubject(array $data, $db) {
        $this->validateSubject($data);

        $subject = new Subject(
            $data['name'],
            $data['curso']
        );

        $subjectRepo = new SubjectRepository($db);
        $subjectid = $subjectRepo->save($subject);
    }
}
