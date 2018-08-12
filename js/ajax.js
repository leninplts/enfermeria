//envia datos para su ingreso a la base de datos
    function loadLog(form) {
     //obteniendo datos
    var dni=form.dni.value;
    var nombre=form.nombre.value;

    for (x = 0; x < form.genero.length; x++)
    {
      if (form.genero[x].checked) {
        var genero = form.genero[x].value;
        break;
      }
    }
    var edad=form.edad.value;
    var peso=form.peso.value;
    var talla=form.talla.value;
    var perimetro=form.perimetro.value;
    var diagnostico=form.diagnostico.value;
    var tratamiento=form.tratamiento.value;
    var observacion=form.observacion.value;

    //alert(dni+nombre+genero+edad+peso+talla+perimetro+diagnostico+tratamiento+observacion);

    LimpiarCampos(form);

    //enviando datos al php
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
        document.getElementById("resultado").innerHTML = xhttp.responseText;
      }
    };

    xhttp.open("POST", "registra.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("dni="+dni+"&nombre="+nombre+"&genero="+genero+"&edad="+edad+"&peso="+peso+"&talla="+talla+"&perimetro="+perimetro+"&diagnostico="+diagnostico+"&tratamiento="+tratamiento+"&observacion="+observacion+"");

    // xhttp.open("POST", "res.php", true);
    // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // ajax.send("dni="+dni+"&nombre="+nombre+"&genero="+genero+"&edad="+edad+"&peso="+peso+"&talla="+talla+"&perimetro="+perimetro+"&diagnostico="+diagnostico+"&tratamiento="+tratamiento+"&observacion="+observacion);
    }

    //función para limpiar los campos
    function LimpiarCampos(form){
      form.dni.value="";
      form.nombre.value="";
      form.edad.value="";
      form.peso.value="";
      form.talla.value="";
      form.perimetro.value="";
      form.diagnostico.value="";
      form.tratamiento.value="";
      form.observacion.value="";
      form.dni.focus();
    }