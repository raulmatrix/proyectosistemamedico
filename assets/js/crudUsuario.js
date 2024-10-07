function actualizarReg(idUsu){
    alert("update");

    let idusu = idUsu;

    $.post("updateUsuario.php", {idusu: idusu}, function(result){

      $("#contenidoModalUpdate").html(result);
      $('#contenidoModalUpdate').show();
    });
}