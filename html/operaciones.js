function operacioness(cual, para1, para2, para3) {
  switch (cual) {
    case "Sumar":
      $.ajax({
        type: "POST",
        url: "operaciones.php",
        data: {
          "accion" : cual,
          "datoA" : para1,
          "datoB" : para2,
        },
        beforeSend: function (){
          resultados.innerHTML = "Procesando...................";
        },
        success: function (result) {
          resultados.innerHTML = result;
        }
        //error: function (resultPHP) {},
      });
    break;
    case "mostNumeros":
      alert("Los números son: " + para1 + " y " + para2);
    break;
    default:
      alert(cual + " No esta programada");
    break;
  }
  /*var operacion = document.getElementById("operacion").value;
  var num1 = document.getElementById("num1").value;
  var num2 = document.getElementById("num2").value;
  var resultado = document.getElementById("resultado");

  if (operacion == "suma") {
    resultado.value = parseInt(num1) + parseInt(num2);
  } else if (operacion == "resta") {
    resultado.value = parseInt(num1) - parseInt(num2);
  } else if (operacion == "multiplicacion") {
    resultado.value = parseInt(num1) * parseInt(num2);
  } else if (operacion == "division") {
    resultado.value = parseInt(num1) / parseInt(num2);
  }*/
}

function dow(){
  $.confirm({
    title: 'Confirm!',
    content: 'Simple confirm!',
    buttons: {
        confirm: function () {
            $.alert('Confirmed!');
        },
        cancel: function () {
            $.alert('Canceled!');
        },
        somethingElse: {
            text: 'Something else',
            btnClass: 'btn-blue',
            keys: ['enter', 'shift'],
            action: function(){
                $.alert('Something else?');
            }
        }
    }
  });
}