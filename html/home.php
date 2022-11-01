<?php
session_start();
session_destroy();
include "../html/barra.php"; 
?>
<style>
  .arrowDown, .arrowUp, .arrowRight, .arrowLeft {
        position: relative;
        display: inline-block;
        width: 26px;
        height: 26px;
        border-radius: 5px;
        background-color: rgb(65, 65, 65);
    }
    .arrowDown::before {
        content: "";
        position: absolute;
        top: 7px;
        left: 5px;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-top: 14px solid white;
    }
    .arrowUp::before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-bottom: 14px solid white;
    }
    .arrowRight::before {
        content: "";
        position: absolute;
        top: 5px;
        left: 7px;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        border-left: 14px solid white;
    }
    .arrowLeft::before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        border-right: 14px solid white;
    }
</style>
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
<div>
  <form action="">
    <span id="texto1" onclick="">Simple etiqueta</span>
    <input type="text" id="valorA">
    <input type="text" id="valorB">
    <select id="operador" onChange="">
      <option value="+">Suma</option>
      <option value="-">Resta</option>
      <option value="*">Multiplicacion</option>
      <option value="/">Division</option>
      <option value="A">Aleatorio</option>
      <option value="sen">seno</option>
    </select>
    <button type="button" onClick="calcular()">
      Calcular
    </button>
  </form>
</div>
<div style="border-color: gray; border-width: 3px; border-style: dotted; height:600px; " id="capa2">
  <div id="capa" style="width:510px; top:15%; position:sticky; left:5% " >
    <img src="../img/hacker.png" alt="Hacker" id="img" width="100%" >
  </div>
</div>
</div>
</div>
<div>
<table>
  <tr>
    <td>
      <button type="button" onClick="zoom()" script="">
        Agrandar
      </button>
    </td>
    <td>
      <button type="button" onClick="alejar()" script="">
        Alejar
      </button>
    </td>
  </tr>
  <tr>
    <td>
      <button type="button" onClick="mostrar()" script="">
        Mostrar
      </button>
    </td>
    <td>
      <button type="button" onClick="ocultar()" script="">
        Ocultar
      </button>
    </td>
  </tr>
</table>
<table>
  <tr>
    <td>
    </td>
    <td>
      <button class='arrowUp' onclick="moverYarriba()"></button>
    </td>
    <td>
    </td>
  </tr>
  <tr>
    <td>
      <button class="arrowLeft" onclick="moverXizquierda()"></button>
    </td>
    <td>
      <button class="arrowDown" onclick="moverYabajo()"></button>
    </td>
    <td>
      <button class='arrowRight' onclick="moverXderecha()"></button>
    </td>
  </tr>
</table>
</div>
<script>

  function moverYarriba() {
    
    if(capa.style.top!=="0%"){
      capa.style.top = (parseInt(capa.style.top)-5)+"%";
      console.log(capa.style.top);
    }
  }
  function moverYabajo() {
    if(capa.style.top!=="100%"){
      capa.style.top = (parseInt(capa.style.top)+5)+"%";
      console.log(capa.style.top);
    }
  }
  function moverXderecha() {
    if(capa.style.left!=="100%"){
      capa.style.left = (parseInt(capa.style.left)+5)+"%";
      console.log(capa.style.left);
    }
  }
  function moverXizquierda() {
    if(capa.style.left!=="0%"){
      capa.style.left = (parseInt(capa.style.left)-5)+"%";
      console.log(capa.style.left);
    }
  }
  function mostrar(){
    capa.style.display="block"
  }
  function ocultar(){
    capa.style.display="none"
  }
  function zoom(){
    capa.style.width = (parseInt(capa.style.width)+10)+"px"
    console.log(capa.style.width);
  }
  function alejar(){
    capa.style.width = (parseInt(capa.style.width)-10)+"px"
    console.log(capa.style.width);
  }
  function calcular(){
    if (valorA.value!=='' && valorB.value!=='') {
      valor1 = parseFloat(valorA.value);
      valor2 = parseFloat(valorB.value);
      switch (operador.value){
        case '+':
          texto1.textContent = valor1+valor2;
        break;
        case '-':
          texto1.textContent = valor1-valor2;
        break;
        case '*':
          texto1.textContent = valor1*valor2;
        break;
        case '/':
          texto1.textContent = valor1/valor2; 
        break;
        case 'A':
          texto1.textContent = Math.floor(Math.random() * (valor2 - valor1)) + valor1;
        break;
        case 'sen':
          texto1.textContent = Math.sin(valor1/57.25);
        break;
        default:
          texto1.textContent = "Error";
      }
    }else{
      alert("No ingresaste datos");
    }
}
</script>