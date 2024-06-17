document.addEventListener("DOMContentLoaded", function() {
  var categoriaSelect = document.getElementById("categoria");
  var subcategoriaGroup = document.getElementById("subcategoria-group");
  var subcategoriaSelect = document.getElementById("subcategoria");
  var subsubcategoriaGroup = document.getElementById("subsubcategoria-group");
  var subsubcategoriaSelect = document.getElementById("subsubcategoria");
  var colorGroup = document.getElementById("color-group");
  var colorSelect = document.getElementById("color");

  categoriaSelect.addEventListener("change", function() {
      var categoriaId = this.value;

      subcategoriaSelect.innerHTML = '<option value="">Selecciona una subcategoría</option>';
      subsubcategoriaSelect.innerHTML = '<option value="">Selecciona una subsubcategoría</option>';
      colorSelect.innerHTML = '<option value="">Selecciona un color</option>'; 

      if (categoriaId !== "") {
          var xhr = new XMLHttpRequest();
          xhr.open("GET", "controlProducto.php?categoria=" + categoriaId);
          xhr.onreadystatechange = function () {
              if (xhr.readyState == 4 && xhr.status == 200) {
                  var subcategorias = JSON.parse(xhr.responseText);

                  subcategoriaSelect.innerHTML = '<option value="">Selecciona una subcategoría</option>';
                  subcategorias.forEach(function (subcategoria) {
                      var option = document.createElement("option");
                      option.value = subcategoria.id;
                      option.textContent = subcategoria.nombre;
                      subcategoriaSelect.appendChild(option);
                  });

                  subcategoriaGroup.style.display = "block";
              }
          };
          xhr.send();
      } else {
          subcategoriaGroup.style.display = "none";
          subsubcategoriaGroup.style.display = "none";
          colorGroup.style.display = "none";
      }
  });

  subcategoriaSelect.addEventListener("change", function() {
      var categoriaId = categoriaSelect.value;
      var subcategoriaId = this.value;

      subsubcategoriaSelect.innerHTML = '<option value="">Selecciona una subsubcategoría</option>';
      colorSelect.innerHTML = '<option value="">Selecciona un color</option>'; 

      if (categoriaId !== "" && subcategoriaId !== "") {
          var xhr = new XMLHttpRequest();
          xhr.open("GET", "controlProducto.php?categoria=" + categoriaId + "&subcategoria=" + subcategoriaId);
          xhr.onreadystatechange = function () {
              if (xhr.readyState == 4 && xhr.status == 200) {
                  var response = JSON.parse(xhr.responseText);

                  var subsubcategorias = response.subsubcategorias;
                  var colores = response.colores;

                  subsubcategoriaSelect.innerHTML = '<option value="">Selecciona una subsubcategoría</option>';
                  subsubcategorias.forEach(function (subsubcategoria) {
                      var option = document.createElement("option");
                      option.value = subsubcategoria.id;
                      option.textContent = subsubcategoria.nombre;
                      subsubcategoriaSelect.appendChild(option);
                  });

                  colorSelect.innerHTML = '<option value="">Selecciona un color</option>';
                  colores.forEach(function (color) {
                      var option = document.createElement("option");
                      option.value = color.color;
                      option.textContent = color.color;
                      colorSelect.appendChild(option);
                  });

                  subsubcategoriaGroup.style.display = subsubcategorias.length > 0 ? "block" : "none";
                  colorGroup.style.display = "block";
              }
          };
          xhr.send();
      } else {
          subsubcategoriaGroup.style.display = "none";
          colorGroup.style.display = "none";
      }
  });

  subsubcategoriaSelect.addEventListener("change", function() {
      var categoriaId = categoriaSelect.value;
      var subcategoriaId = subcategoriaSelect.value;
      var subsubcategoriaId = this.value;

      if (categoriaId !== "" && subcategoriaId !== "" && subsubcategoriaId !== "") {
          var xhr = new XMLHttpRequest();
          xhr.open("GET", "controlProducto.php?categoria=" + categoriaId + "&subcategoria=" + subcategoriaId + "&subsubcategoria=" + subsubcategoriaId);
          xhr.onreadystatechange = function () {
              if (xhr.readyState == 4 && xhr.status == 200) {
                  var colores = JSON.parse(xhr.responseText);

                  colorSelect.innerHTML = '<option value="">Selecciona un color</option>';
                  colores.forEach(function (color) {
                      var option = document.createElement("option");
                      option.value = color.color;
                      option.textContent = color.color;
                      colorSelect.appendChild(option);
                  });

                  colorGroup.style.display = "block";
              }
          };
          xhr.send();
      } else {
          colorGroup.style.display = "none";
      }
  });
});
