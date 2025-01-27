<?php

namespace App\School\Services;
use App\School\Entities\Degrees;
use App\Infrastructure\Persistence\DegreesRepository;
use App\School\Repositories\IDegreesRepository;  


class DegreeService{

    private IDegreesRepository $DegreeRepository;

    public function __construct(IDegreesRepository $DegreeRepository){
        $this->DegreesRepository=$DegreeRepository;
    }

    public function talktodegree(){
        return $this->DegreesRepository->alldegrees();
    }

    public function validateDegree(){
        $data=$_POST;

        if(empty($data['name']) || empty ($data['duration_years'])){
            throw new \InvalidArgumentException("Error al añadir un grado formativo");
        }
    }

    public function addegree(array $data, $db){

        // Validaciones del Grado
        $this->validateDegree($data);

        $degree = new Degrees(
            $data['name'],
            $data['duration_years']
        );

        $degreerepo = new DegreesRepository($db);
        $degreeid = $degreerepo->save($degree);
    }
}
?>