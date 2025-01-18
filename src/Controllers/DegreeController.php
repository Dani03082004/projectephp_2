<?php 

    namespace App\Controllers;
    use App\School\Entities\Degrees;
    use App\Infrastructure\Persistence\DegreesRepository;
    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Services\DegreeService;

    class DegreeController{

        private DegreeService $DegreeService;

        public function __construct(){
            $db = DatabaseConnection::getConnection();
            $DegreeRepo = new DegreesRepository($db);
            $DegreeService = new DegreeService($DegreeRepo);
            $this->DegreeService = $DegreeService;
        }

        function index(){
            $degrees = $this->DegreeService->talktodegree();
            echo view('degree',['degree' => $degrees]);
        }
        
        function addegree(){
            $data = $_POST;
            $db = DatabaseConnection::getConnection($db);

            try {
                $this->DegreeService->addegree($data,$db);
                header("Location: /"); 
                exit;
            } catch (\InvalidArgumentException $e) {
                echo "Error: " . $e->getMessage();
                exit;
            }
        }
    }