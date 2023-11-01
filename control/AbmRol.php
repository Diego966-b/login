<?php
class AbmRol {

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Tabla
     */

     private function cargarObjeto($param){
        $obj = null;

        if(array_key_exists('idRol', $param) && array_key_exists('rolDescripcion', $param)){
            $obj = new Rol();
            $obj->setear($param['idRol'], $param['rolDescripcion']);
        }

        return $obj;
     }

        /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Tabla
     */

    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['idRol'])) {
            $obj = new Rol();
            $obj->setear($param['idRol'], null);
        }
        return $obj;
    }

      /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

     private function seteadosCamposClaves($param)
     {
         $respuesta = false;
         if (isset($param['idRol'])) {
             $respuesta = true;
         }
         return $respuesta;
     }

         /**
     * 
     * @param array $param
     */
    public function alta($param)
    {
        $respuesta = false;
        $param['idRol'] = null;
        $elObjRol = $this->cargarObjeto($param);
        if ($elObjRol != null and $elObjRol->insertar()) {
            $respuesta = true;
        }
        return $respuesta;
    }

    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $respuesta = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjRol = $this->cargarObjetoConClave($param);
            if ($elObjRol != null && $elObjRol->eliminar()) {
                $respuesta = true;
            }
        }
        return $respuesta;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        $respuesta = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjRol = $this->cargarObjeto($param);
            if ($elObjRol != null and $elObjRol->modificar()) {
                $respuesta = true;
            }
        }
        return $respuesta;
    }

     /**
     * permite buscar un objeto
     * @param array $param
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idRol'])) {
                $where .= " and idRol =" . $param['idRol'];
            }
            if (isset($param['rolDescripcion'])) {
                $where .= " and rolDescripcion ='" . $param['rolDescripcion'] . "'";
            }
        }
        $arreglo = Rol::listar($where);
        return $arreglo;
    }


 
}