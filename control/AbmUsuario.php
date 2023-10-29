<?php

class AbmAuto{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Autos
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idUsario',$param) and array_key_exists('usNombre',$param)and
        array_key_exists('usPass',$param) and array_key_exists('usMail',$param) and array_key_exists('usDeshabilitado',$param) 
        ){
            $obj = new Usuario();
            $obj->setear($param['idUsaurio'], $param['usNombre'], $param['usPass'], $param['usMail'],$param['usDeshabilitado']);
          }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Auto
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idUsuario']) and (isset($param['usNombre'])) and (
            isset($param['usPass'])) and (isset($param['usMail'])) and (isset($param['usDeshabilitado'])) ){
            $obj = new Usuario();
            $obj->setear($param['idUsaurio'], $param['usNombre'], $param['usPass'], $param['usMail'],$param['usDeshabilitado']);
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
        if (isset($param['idUsuario']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param['nroDni'] =null; //No hace falta no es auto increment
        $elObjtUser= $this->cargarObjeto($param);
        //verEstructura($elObjtTabla);
        if ($elObjtUser!=null and $elObjtUser->insertar()){
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
            $elObjtUser = $this->cargarObjetoConClave($param);
            if ($elObjtUser!=null and $elObjtUser->eliminar()){
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
            $elObjtUser = $this->cargarObjeto($param);
            if($elObjtUser!=null and $elObjtUser->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['idUsuario'])){
                $where.=" and idUsuario ='".$param['idUsuario']."'";}
            if  (isset($param['usNombre'])){
                 $where.=" and usNombre ='".$param['usNombre']."'";}
            if  (isset($param['usPass'])) {
                $where.=" and usPass ='".$param['usPass']."'";
            }
            if  (isset($param['usMail'])) {
                $where.=" and usMail ='".$param['usMail']."'";
            }
            if  (isset($param['usDeshabilitado'])) {
                $where.=" and usDeshabilitado ='".$param['usDeshabilitado']."'";
            }    
        }
        $arreglo = Usuario::listar($where);  
        return $arreglo;
              
    }
}
?>