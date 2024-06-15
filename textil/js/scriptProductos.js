document.getElementById("categoria").addEventListener("change", function () {
  var categoriaId = this.value;
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "controlProducto.php?categoria=" + categoriaId, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var subcategorias = JSON.parse(xhr.responseText);
      var subcategoriaSelect = document.getElementById("subcategoria");
      subcategoriaSelect.innerHTML =
        '<option value="">Selecciona una subcategoría</option>';
      for (var i = 0; i < subcategorias.length; i++) {
        var option = document.createElement("option");
        option.value = subcategorias[i].id;
        option.textContent = subcategorias[i].nombre;
        subcategoriaSelect.appendChild(option);
      }
      document.getElementById("subcategoria-group").style.display =
        subcategorias.length > 0 ? "block" : "none";
      document.getElementById("color-group").style.display = "none";
    }
  };
  xhr.send();
});

document.getElementById("subcategoria").addEventListener("change", function () {
  var categoriaId = document.getElementById("categoria").value;
  var subcategoriaId = this.value;
  var xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "controlProducto.php?ajax=colores&categoria=" +
      categoriaId +
      "&subcategoria=" +
      subcategoriaId,
    true
  );
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var colores = JSON.parse(xhr.responseText);
      var colorSelect = document.getElementById("color");
      colorSelect.innerHTML = '<option value="">Selecciona un color</option>';
      for (var i = 0; i < colores.length; i++) {
        colorSelect.innerHTML +=
          '<option value="' +
          colores[i].color +
          '">' +
          colores[i].color +
          "</option>";
      }
      document.getElementById("color-group").style.display =
        colores.length > 0 ? "block" : "none";
    }
  };
  xhr.send();
});
