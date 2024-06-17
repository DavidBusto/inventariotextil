document.addEventListener("DOMContentLoaded", function() {
    var categoriaSelect = document.getElementById("categoria");
    var subcategoriaGroup = document.getElementById("subcategoria-group");
    var subcategoriaSelect = document.getElementById("subcategoria");
    var subsubcategoriaGroup = document.getElementById("subsubcategoria-group");
    var subsubcategoriaSelect = document.getElementById("subsubcategoria");

    categoriaSelect.addEventListener("change", function() {
        var categoriaId = this.value;
        
        
        subcategoriaSelect.innerHTML = '<option value="">Selecciona una subcategoría</option>';
        subsubcategoriaSelect.innerHTML = '<option value="">Selecciona una subsubcategoría</option>';
        subsubcategoriaGroup.style.display = "none";

        if (categoriaId !== "") {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "controlProductoAdd.php?categoria=" + categoriaId, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var subcategorias = JSON.parse(xhr.responseText);
                    
                    subcategorias.forEach(function (subcategoria) {
                        var option = document.createElement("option");
                        option.value = subcategoria.id;
                        option.textContent = subcategoria.nombre;
                        subcategoriaSelect.appendChild(option);
                    });

                    subcategoriaGroup.style.display = subcategorias.length > 0 ? "block" : "none";
                }
            };
            xhr.send();
        } else {
            subcategoriaGroup.style.display = "none";
        }
    });

    subcategoriaSelect.addEventListener("change", function() {
        var categoriaId = categoriaSelect.value;
        var subcategoriaId = this.value;

        if (categoriaId !== "" && subcategoriaId !== "") {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "controlProductoAdd.php?categoria=" + categoriaId + "&subcategoria=" + subcategoriaId, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var subsubcategorias = JSON.parse(xhr.responseText);
                    
                    subsubcategoriaSelect.innerHTML = '<option value="">Selecciona una subsubcategoría</option>';

                    subsubcategorias.forEach(function (subsubcategoria) {
                        var option = document.createElement("option");
                        option.value = subsubcategoria.id;
                        option.textContent = subsubcategoria.nombre;
                        subsubcategoriaSelect.appendChild(option);
                    });

                    subsubcategoriaGroup.style.display = subsubcategorias.length > 0 ? "block" : "none";
                }
            };
            xhr.send();
        } else {
            subsubcategoriaSelect.innerHTML = '<option value="">Selecciona una subsubcategoría</option>';
            subsubcategoriaGroup.style.display = "none";
        }
    });
});
