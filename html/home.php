<?php
session_start();
session_destroy();
include "../html/barra.php"; 
?>
<div class="form-group" style="height: 600px;"> 

<div class="card border-secondary mb-3" style="max-width: 60rem; top:50px; margin-left: auto; margin-right: auto;" >
 
  <div class="card-body">
  <table class="table table-hover">
  <tbody>
      <tr class="table-secondary">
      <th scope="row">
       No eres usuario xD
        </th>
       </tr>
  </tbody>
</table>
</div>
<form action="">
  <span id="texto1" onclick="">Simple etiqueta</span>
  <input type="text" id="valorA">
  <input type="text" id="valorB">
  <select id="operador" onChange="">
    <option value="suma">Suma</option>
    <option value="resta">Resta</option>
    <option value="multiplicacion">Multiplicacion</option>
    <option value="division">Division</option>
    <option value="vAleatorio">Aleatorio</option>
    <option value="seno">seno</option>
  </select>
<button type="button" onClick="calcular()">Calcular</button>
</form>
</div>
</div>

<script>
function calcular(){
  switch (){

    case '+':
      alert(x);
    break;
    case '-':

    break;
    case '*':

    break;
    case '/':

    break;
  }
}
</script>