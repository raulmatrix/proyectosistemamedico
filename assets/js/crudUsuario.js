function actualizarReg(idUsu){
    

    let idusu = idUsu;

    $.post("updateUsuario.php", {idusu: idusu}, function(result){

      $("#contenidoModalUpdate").html(result);
      $('#contenidoModalUpdate').show();
    });
}


function eliminar(idUsu){
  alert("Usuario: " + idUsu)
  let usuario = idUsu;
  $.post("deleteUsuario.php", {usuario: usuario}, function(result){
    window.location.href = "http://localhost:9191/sistemamedico/listausuarios.php";
  });
}