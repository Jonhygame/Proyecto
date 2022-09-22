<?
//include "classBD.php";
$conexion=mysqli_connect("localhost","Jonhy","4/2001/9jJ","empresaservicios"); 

$cadena="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789123456789";
$numeC=strlen($cadena);
$nuevPWD="";
for ($i=0; $i<8; $i++)
  $nuevPWD.=$cadena[rand()%$numeC]; 

$cad="insert into Usuario set Nombre='".$_POST['nombres']."', Apellidos='".$_POST['apellidos']."', Email='".$_POST['email']."', Pwd'".$nuevPWD."',Idrol=1, 
Fecha_Ulti_Acceso='"date("Y-m-d H:i:s")."'"";


 include("class.phpmailer.php");
 include("class.smtp.php");

$mail = new PHPMailer();
$mail->IsSMTP();
    $mail->Host="smtp.gmail.com"; //mail.google
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $mail->Port = 465;     // set the SMTP port for the GMAIL server
    $mail->SMTPDebug  = 1;  // enables SMTP debug information (for testing)
                              // 1 = errors and messages
                              // 2 = messages only
    $mail->SMTPAuth = true;   //enable SMTP authentication
    
    $mail->Username =   "contreras.villanuevaus@gmail.com"; // SMTP account username
    $mail->Password = "egcxzzocduqllzwv";  // SMTP account password
      
    $mail->From="";
    $mail->FromName="";
    $mail->Subject = "Registro completo";
    $mail->MsgHTML("<h1>BIENVENIDO ".$_POST['nombres']." ".$_POST['apellidos']."</h1><h2> tu clave de acceso es : ".$_POST['password']."</h2>");
    $mail->AddAddress($_POST['correo']);
    //$mail->AddAddress("admin@admin.com");
    if (!$mail->Send()) 
          echo  "Error: " . $mail->ErrorInfo;
    else { $result=mysqli_query($conexion,$cad);
           header("location: index.php?e=7"); }
/*

PROBLEMAS A SOLUCIONAR EN EL REGISTRO
1) DETECTAR QUE EL CORREO YA ESTA REGISTRADO, 
   YA QUE ES LA LLAVE PRIMARIA Y NO SE DEBE ENVIAR
   EL CORREO SI YA ESTABA REGISTRADO.
2) LA CLAVE DEBE DE CIFRARSE, POR QUE EN EL 
   LOGUEO SE CIFRA.


*/











?>