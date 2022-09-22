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
    var $a_error;
    function m_conecta(){
        $this->a_conexion = mysqli_connect("localhost","Jonhy","4/2001/9jJ","empresaservicios");    
    }

    function m_desconecta(){
        mysqli_close($this->a_conexion);
    }

    function m_query($pQuery){
        $this->m_conecta();
        $this->a_error = false;
        $result = mysqli_query($this->a_conexion, $pQuery);
        $this->a_numRegistros = mysqli_num_rows($result);
        
        $this->m_desconecta();
    }
}
$oDB = new baseDatos();

function m_imprLista(){

}
?>