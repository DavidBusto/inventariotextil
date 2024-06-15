document.getElementById("categoria").addEventListener("change", function () {
  var categoriaId = this.value;
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "controlStock.php?categoria=" + categoriaId, true);
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
    }
  };
  xhr.send();
});
