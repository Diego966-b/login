<?php
class AbmUsuarioRol {

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Autos
     */
    private function cargarObjeto ($param){
        $obj = null;
        if (array_key_exists('idUsuario',$param) and array_key_exists('idRol',$param))
        {
            //Inicio modificacion Marco

            $obj = new UsuarioRol();
            $abmUsuario = new AbmUsuario ();
            $abmRol = new AbmRol ();
            $array = [];
            $array ['idUsuario'] = $param['idUsuario'];
            $array ['idRol'] = $param['idRol'];
            $objUsuario = $abmUsuario -> buscar ($array);
            $objRol = $abmRol -> buscar ($array);
           //Fin modificacion Marco
            $obj -> setear($objUsuario, $objRol);
        }

        
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
     private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['objRol']) && (isset($param['objUsuario'])))
            $resp = true;
        return $resp;
    }
    
    /**
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        
        // $param['Patente'] = null;
        $elObjUsuarioRol = $this->cargarObjeto($param);
        if ($elObjUsuarioRol!=null and $elObjUsuarioRol->insertar()){
            $resp = true;
        }
        return $resp;
    }

    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjUsuarioRol = $this->cargarObjetoConClave($param);
            if ($elObjUsuarioRol!=null and $elObjUsuarioRol->eliminar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjUsuarioRol = $this->cargarObjeto($param);
            if($elObjUsuarioRol!=null and $elObjUsuarioRol->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite buscar un objeto
     * @param array $param
     */
    public function buscar($param){
        // $where = "true "; 1=1
        $where = " true ";
        if ($param<>NULL)
        {
            if  (isset($param['idUsuario'])) {
                $where.=" and idUsuario=".$param['idUsuario'];
            }
            if  (isset($param['idRol'])) {
                $where.=" and idRol ='".$param['idRol']."'";
            }
        }
        $arreglo = UsuarioRol::listar($where);
        return $arreglo;  
    }
}
?>