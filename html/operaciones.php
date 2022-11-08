<?php
class Operaciones{


  function __construct(){
  }
  function procesa($cual){
    $result="";
    switch($cual){
      case "Sumar":
        $result=$_REQUEST['datoA']+$_REQUEST['datoB'];
        break;
      case "mostNumeros":
        if($_REQUEST['datoA']<=$_REQUEST['datoB']){
          for (; $_REQUEST['datoA'] < $_REQUEST['datoB'] ; $_REQUEST['datoA']++) { 
            $result .=$_REQUEST['datoA'].", ";
          }
        }else{
          for (; $_REQUEST['datoA'] > $_REQUEST['datoB'] ; $_REQUEST['datoA']--) { 
            $result .=$_REQUEST['datoA'].", ";
          }
        }
        break;
      default:
        echo "No se que hacer";
    }
    return $result;
  }
}
$oOperaciones = new Operaciones();
if(isset( $_REQUEST['accion'])){
  echo $oOperaciones->procesa($_REQUEST['accion']);
}