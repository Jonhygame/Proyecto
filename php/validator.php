<?php
session_start();

include "../php/classBaseDeDatos.php";
$oDB = new baseDatos();
$cad = "SELECT * FROM Usuario WHERE Email='".$_POST['email']."' AND Pwd='".$_POST['pwd']."';";
//echo $cad;
//exit();
$_POST['pwd']=str_replace("'","",$_POST['pwd']);
$_POST['email']=str_replace("'","",$_POST['email']);

$datosUsuario = $oDB -> m_obtenerRegistro($cad);
if($oDB->a_numRegistros == '1' ){
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['nombUsuario'] = $datosUsuario['Nombre'].' '. $datosUsuario['Apellido'];
    $cad = "UPDATE Usuario SET fecha_ulti_acceso='".date("Y-m-d")."',Accesos=Accesos+1 WHERE Email='".$_POST['email']."'";
    $oDB->m_query($cad);
    if($datosUsuario['id_Rol'] == '1'){
        header("location: ../html/index.php?");
        $_SESSION['admin']=true;
    }else{
        header("location: ../html/homeUser.php");
    }
}else{
    header("location: ../html/login.php?e=1");
}
?>