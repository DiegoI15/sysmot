<?php

class LoginDTO
{
    private $usuario;
    private $password;

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }
}

class UserDto
{
    public $usuario;
    public $estado;
    public $nombre;
    public $apPaterno;
    public $apMaterno;
    public $privilegios = array();
}

class PrivilegiosDTO
{
    public $label;
    public $url;
    public $imagen;
}
