<?php
include_once("../Repository/AuthRepository.php");
include_once("../DTO/LoginDTO.php");
include_once("../Model/LogIn.php");

class AuthService
{
    private $authRepository;

    public function __construct()
    {
        $this->authRepository = new AuthRepository();
    }

    public function Login(LoginDTO $dto)
    {
        $model = new Login();
        $model->setUsuario($dto->getUsuario());
        $model->setPassword($dto->getPassword());
        $resultDb = $this->authRepository->login($model);
        $result = array();
        if (count($resultDb) >= 1) {
            //Obtener Datos del usuario
            $firstRow = $resultDb[0];
            $result["USUARIO"] = $firstRow["USUARIO"];
            $result["ESTADO"] = $firstRow["ESTADO"];
            $result["NOMBRES"] = sprintf("%s %s", $firstRow["NOMBRE"], $firstRow["APELLIDO_PAT"]);
            $result["PRIVILEGIOS"] = array();

            //Listar privilegios
            foreach ($resultDb as $row) {
                $path = array(
                    "path" => $row["URL"],
                    "img" => $row["IMAGEN"],
                    "label" => $row["LABEL"],
                );
                array_push($result["PRIVILEGIOS"], $path);
            }
        }
        return $result;
    }
}
