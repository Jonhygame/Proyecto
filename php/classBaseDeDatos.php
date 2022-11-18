<?php

/*class classname extends anotherClass{
    function __construct(argument){
        // code...
    }
}
tipo_de_Dato Nombre(Parametros){
    //code


    SEGURIDAD
    1)TODA APLICACION DEBE TENER USUARIO Y CONTRASEÑA
    2)DEBES EVITAR INYECCION DE CODIGO
    3)NADIE PUEDE VER LA CONTRASEÑA(UTILIZAREMOS (PASSWORD COMO ENCRIPTACION Y SERA 41) Y  AMD5 32)
}*/


class baseDatos {
    var $a_conexion;
    var $a_numRegistros;
    var $a_error = false;
    var $a_registros;
    function m_conecta(){
        $this->a_conexion = mysqli_connect("localhost","Jonhy","4/2001/9jJ","empresaservicios");    
    }

    function m_desconecta(){
        mysqli_close($this->a_conexion);
    }

    function m_query($pQuery){
        $this->m_conecta();
        $this->a_error = false;
        $this->a_registros =  mysqli_query($this->a_conexion, $pQuery);
        if (mysqli_error($this->a_conexion)>""){
            $this->a_error = true;
        }
        if(strpos(strtoupper($pQuery), "SELECT") !== false){
            $this->a_numRegistros = mysqli_num_rows($this->a_registros);
        }
        /*if(strpos(strtoupper($pQuery), "Select"){
            echo(uno mas);
        }*/
        $this->m_desconecta();
    }

    function m_obtenerRegistro($query){
        $this -> m_query($query);
        return mysqli_fetch_array($this->a_registros);
    }

    function m_recuRegistro(){
        return mysqli_fetch_array($this->a_registros);
    }
    function m_crearLista($tabla,$PK,$nombCampo,$ordenarPor,$seleccionado=-1){
        
        $cad = "Select ".$PK.", ".$ordenarPor." from ".$tabla." order by ".$ordenarPor;"";
        $this->m_query($cad);
        $result = '<select class="form-control" name="'.$nombCampo.'">';
        foreach ($this->a_registros as $row ) {
            $result .= '<option name"servicio" value="'.$row[$PK].'">'.$row[$nombCampo].'</option>';
            //$result.='<input type="hidden" name="id_Servicio" value="'.$row[$PK].'" />';
        }
        $result .= '</select>';
        return $result;
    }
}
$oDB = new baseDatos();
?>