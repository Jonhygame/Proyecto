<?
include "../html/barraUser.php";
include "../php/classUsers.php";
$oUsers=new Users();
$oUsers->ejecuta("viewProfile");
echo '<div Style=text-align:center;>';
echo "Hola  desde usuarios";
echo "<br>";
?>
<img src="../img/gatito.gif" alt="gatito bailando">
</div>