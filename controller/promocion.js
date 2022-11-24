function promocion(cual, para1, para2, para3) {
  switch (cual) {
    case "editForm":
      $.ajax({
        data:{"id_Promocion":para1},
        type:"post",
        url:"../php/classPromocion.php?accion=editForm",
        success:function(resu){
            ventana = $.dialog({
              title:'Promoción',
              content: resu,
              columnClass: 'col-md-6 col-md-offset-3',
              type:"green",
            });
          }
      });
    break;
    case "newForm":
      ventana = $.dialog({
        title:'Nueva Promoción',
        content: 'url:../php/classPromocion.php?accion=newForm',
        columnClass: 'col-md-6 col-md-offset-3',
        type:"green",
      });
    break;
    case "insert":
      if (NomPromocion.value=="") {
        alerta("Error","El campo Nombre no puede estar vacío.");
        NomPromocion.focus();
      }else{
        if(PorcPromocion.value==""){
          alerta("Error","El campo Porcentaje no puede estar vacío.");
          PorcPromocion.focus();
        }else{
          $.ajax({
            data:$("#formPromocion").serialize(),
            type:"post",
            url:"../php/classPromocion.php?accion=insert",
            beforeSend:function(){
              principal.innerHTML="Espere un momento";
            },
            success:function(resu){
              principal.innerHTML=resu;
            },
          });
          ventana.close();
        }
      }
    break;
    default:
      $.alert({
        title: "Atencion!",
        content:
          '<span class="text-danger" La opcion <b>' +
          cual + "</b> No esta programada en promocion.js</span>",
      });
      break;
  }
}

function alerta(titulo,contenido){
  $.alert({
    title: titulo,
    content: contenido,
    columnClass: "col-md-6 col-md-offset-3",
    type: "red",
  });
}