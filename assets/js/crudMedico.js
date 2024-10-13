function actualizarMed(idMed) {
    // Solo muestra un mensaje de alerta con el ID del médico (puedes quitar esto si no lo necesitas)
    alert("idMed " + idMed);

    // Envía el ID del médico mediante POST a updateMedico.php
    $.post("updateMedico.php", { idMed: idMed }, function(result) {
        // Cuando obtienes la respuesta, la insertas en el modal
        $("#contenidoModalUpdateMedico").html(result);

        // Asegura que el modal esté visible si no lo está
        $('#contenidoModalUpdateMedico').show();
    });
}



function eliminar(idMed){
  alert("Usuario: " + idMed)
  let idMed = idMed;
  $.post("deleteMedico.php", {idMed: idMed}, function(result){
    window.location.href = "http://localhost:9191/sistemamedico/listamedicos.php";
  });
}