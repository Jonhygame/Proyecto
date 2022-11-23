function promocion(cual, para1, para2, para3) {
  switch (cual) {
    case "newForm":
      $.ajax({
        data:{},
      });
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
