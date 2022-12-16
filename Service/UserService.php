<?php

include_once("../Repository/UserRepository.php");
include_once("../DTO/UserDTO.php");
include_once("../Model/User.php");

class UserService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function listarUsuarios($user)
    {
        $model = new User();
        $model->setUser($user);
        $resultDb = $this->userRepository->SelUser($model);
        $result = array();
        foreach ($resultDb as $value) {
            $data = array(
                $value["USUARIO"],
                $value["ESTADO"],
                $value["NOMBRE"],
                $value["APELLIDO_PAT"],
                $value["APELLIDO_MAT"],
                $value["DOCUMENTO"]
            );
            array_push($result, $data);
        }
        return $result;
    }

    public function listarRoles()
    {
        $resultDb = $this->userRepository->SelRoles();
        $result = array();
        foreach ($resultDb as $value) {
            $data = array(
                $value["ID"],
                $value["LABEL"]
            );
            array_push($result, $data);
        }
        return $result;
    }

    public function guardarUsuario(UsuarioNuevoDTO $dto, $roles)
    {
        //Creacion de usuarios
        $model = new UsuarioNuevo();
        $model->setApMaterno($dto->getApMaterno());
        $model->setApPaterno($dto->getApPaterno());
        $model->setNombre($dto->getNombre());
        $model->setDocumento($dto->getDocumento());
        $model->setEmail($dto->getEmail());
        $model->setNumero($dto->getNumero());
        $model->setUsuario($dto->getUsuario());
        $model->setEstado($dto->getEstado());
        $model->setReset($dto->getReset());
        try {
            $this->userRepository->InsUser($model);
        } catch (Exception $e) {
            echo ($e->getMessage());
        }

        //Asignacion de privilegios
        $model = new UsuarioPrivilegios();
        $model->setDocumento($dto->getDocumento());
        foreach ($roles as $rol) {
            $model->setRol($rol);
            try {
                $this->userRepository->InsRole($model);
            } catch (Exception $e) {
                echo ($e->getMessage());
            }
        }
    }

    public function borrarUser($document)
    {
        $this->userRepository->DelUser($document);
    }

    // public function getById($do)
    // {
    //     $model = new User();
    //     $model->setUser($user);
    //     $resultDb = $this->userRepository->SelUser($model);
    //     $result = array();
    //     return $result;
    // }

    // public function delete($user)
    // {
    //     $model = new User();
    //     $model->setUser($user);
    //     $resultDb = $this->userRepository->SelUser($model);
    //     $result = array();
    //     foreach ($resultDb as $value) {
    //         $data = array(
    //             $value["USUARIO"],
    //             $value["ESTADO"],
    //             $value["NOMBRE"],
    //             $value["APELLIDO_PAT"],
    //             $value["APELLIDO_MAT"],
    //             $value["DOCUMENTO"]
    //         );
    //         array_push($result, $data);
    //     }
    //     return $result;
    // }
}
