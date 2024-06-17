document.addEventListener("DOMContentLoaded", function () {
  const categoriaSelect = document.getElementById("categoria");
  const subcategoriaGroup = document.getElementById("subcategoria-group");
  const subcategoriaSelect = document.getElementById("subcategoria");
  const subsubcategoriaGroup = document.getElementById("subsubcategoria-group");
  const subsubcategoriaSelect = document.getElementById("subsubcategoria");

  categoriaSelect.addEventListener("change", function () {
      var categoriaId = this.value;
      if (categoriaId) {
          subcategoriaGroup.style.display = 'block';
      } else {
          subcategoriaGroup.style.display = 'none';
          subsubcategoriaGroup.style.display = 'none';
      }
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "controlStock.php?categoria=" + categoriaId, true);
      xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
              var subcategorias = JSON.parse(xhr.responseText);
              subcategoriaSelect.innerHTML =
                  '<option value="">Selecciona una subcategoría</option>';
              for (var i = 0; i < subcategorias.length; i++) {
                  var option = document.createElement("option");
                  option.value = subcategorias[i].id;
                  option.textContent = subcategorias[i].nombre;
                  subcategoriaSelect.appendChild(option);
              }
              if (subcategorias.length === 0) {
                  subsubcategoriaGroup.style.display = 'none';
              }
          }
      };
      xhr.send();
  });

  subcategoriaSelect.addEventListener("change", function () {
      var categoriaId = categoriaSelect.value;
      var subcategoriaId = this.value;
      if (subcategoriaId) {
          subsubcategoriaGroup.style.display = 'block';
      } else {
          subsubcategoriaGroup.style.display = 'none';
      }

      var xhr = new XMLHttpRequest();
      xhr.open("GET", "controlStock.php?categoria=" + categoriaId + "&subcategoria=" + subcategoriaId, true);
      xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
              var subsubcategorias = JSON.parse(xhr.responseText);
              subsubcategoriaSelect.innerHTML =
                  '<option value="">Selecciona una subcategoría</option>';
              for (var i = 0; i < subsubcategorias.length; i++) {
                  var option = document.createElement("option");
                  option.value = subsubcategorias[i].id;
                  option.textContent = subsubcategorias[i].nombre;
                  subsubcategoriaSelect.appendChild(option);
              }
              if (subsubcategorias.length === 0) {
                  subsubcategoriaGroup.style.display = 'none';
              }
          }
      };
      xhr.send();
  });

  if (categoriaSelect.value) {
      categoriaSelect.dispatchEvent(new Event('change'));
  }
});