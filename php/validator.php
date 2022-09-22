<?php
/*var_dump ($_GET);
echo "<br></br>";
var_dump($_POST);
echo "<br></br>";
var_dump($_REQUEST);
$a;
$a = 5;
echo $a;
$a = "Hola mundo ";
echo $a;
$a = 2;
echo $a . "Holis"."<br></br>".$a;
echo "<br></br>";
$conexcion = mysqli_connect("localhost","Jonhy","4/2001/9jJ","empresaservicios");
if (!$conexcion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$Query = "SELECT * FROM empresaservicios.usuario where Nombre = '" . $_POST[] . "'";  
$result = mysqli_query($conexcion, $Query);

while ($row = mysqli_fetch_array($result)) {
    echo $row['Nombre'];
    echo ' ';
    echo $row['Apellido'];
    echo ' ';
    echo $row['Genero'];
    echo "<br></br>";
}
function suma($a,$b){
    return $a + $b;
}
echo suma(50.5,50.6);*/
include "classBaseDeDatos.php";
$oBD = new baseDatos();
$cad = "SELECT * FROM Usuario WHERE Email='".$_POST['email']."' AND Pwd='".$_POST['pwd']."';";
//echo $cad;
//exit();
$_POST['pwd']=str_replace("'","",$_POST['pwd']);
$_POST['email']=str_replace("'","",$_POST['email']);

$oDB -> m_query($cad);

if($oDB->a_numRegistros == '1' ){
    header("location: ../html/index.php");
}else{
    header("location: ../html/login.php?e=1");
}
?>