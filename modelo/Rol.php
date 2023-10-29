
<?php

class Rol {
    private $idRol;
    private $rolDescripcion;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->idRol = "";
        $this->rolDescripcion = "";
        $this->mensajeoperacion = "";
    }

    public function setear($idRol, $rolDescripcion){
        $this->setIdRol($idRol);
        $this->setRolDescripcion($rolDescripcion);
    }

    public function setIdRol($idRol){
        $this->idRol = $idRol;
    }

    public function getIdRol(){
        return $this->idRol;
    }

    public function setRolDescripcion($rolDescripcion){
        $this->rolDescripcion = $rolDescripcion;
    }

    public function getRolDescripcion(){
        return $this->rolDescripcion;
    }

    public function setMensajeOperacion($mensaje)
    {
        $this->mensajeoperacion = $mensaje;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeoperacion;
    }


    public function cargar()
    {
        $respuesta = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM rol WHERE idRol = " . $this->getIdRol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idRol'], $row['rolDescripcion']);
                }
            }
        } else {
            $this->setMensajeOperacion("Rol->listar: " . $base->getError());
        }
        return $respuesta;
    }


    public function insertar()
    {
        $respuesta = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO rol (idRol, rolDescripcion)
        VALUES ('"
            . $this->getidRol() . "', '"
            . $this->getRolDescripcion() . "')";


        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $respuesta = true;
            } else {
                $this->setMensajeOperacion("Rol->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Rol->modificar: " . $base->getError());
        }
        return $respuesta;
    }

    public function modificar()
    {
        $respuesta = false;
        $base = new BaseDatos();
        $sql = "UPDATE rol SET 
        idRol='" . $this->getIdRol() . "," .
        "rolDescripcion=" . $this->getRolDescripcion() . "' WHERE idRol=" . $this->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $respuesta = true;
            } else {
                $this->setMensajeOperacion("Rol->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Rol->modificar: " . $base->getError());
        }
        return $respuesta;
    }

    public function eliminar()
    {
        $respuesta = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM rol WHERE idRol=" . $this->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $respuesta = true;
            } else {
                $this->setMensajeOperacion("Rol->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Rol->eliminar: " . $base->getError());
        }
        return $respuesta;
    }

    public function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos;
        $sql = "SELECT * FROM rol ";
        if ($parametro != "") {
            $sql .= "WHERE " . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Rol();
                    $obj->setear($row['idRol'], $row['rolDescripcion']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeoperacion("Rol->listar: " . $base->getError());
        }
        return $arreglo;
    }


}

?>