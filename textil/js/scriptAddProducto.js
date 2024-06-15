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
      subcategorias.forEach(function (subcategoria) {
        var option = document.createElement("option");
        option.value = subcategoria.id;
        option.textContent = subcategoria.nombre;
        subcategoriaSelect.appendChild(option);
      });
    }
  };
  xhr.send();
});
