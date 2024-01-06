        
     
                        function listar_musicales(pag) {
                            $("#buscador-general").show().animate({ "opacity": "1"}, 1000);
                            
                                        var start = (pag-1)*20;
                                        var texto=$("#busqueda_musicales").val();
                                        var parametros={
                                            "start":start,
                                            "texto":texto
                                        }
                                    

                            var result1 = '';
                            $.ajax({
                                 data:parametros, 
                                url: "../musicales/listaMusicales.php",
                                type: "post",
                                success: function (response) {

                                    result1 = response;
                                    
                                jQuery.ajax({
                                    type: "POST",
                                    url: "../musicales/generar_paginacion.php",
                                    data: parametros,
                                    dataType: "JSON",
                                    success: function (data) {

                                        $("#musicales-result").html(response + data.tabla);
                                        $('.pagination').pagination({
                                            items: data.records,
                                            itemsOnPage: 20,
                                            cssStyle: 'light-theme',
                                            currentPage: pag,
                                        });
                                
                                    }, beforeSend: function () {
                                        $("#musicales-result").show();
                                        $("#musicales-result").html(`<div style="text-align:center">
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="spinner-border" role="status">
                                                                                <span class="visually-hidden"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>`);
                                    }
                                });
                    

                                }, beforeSend: function () {
                                    $("#musicales-result").show();
                                    $("#musicales-result").html(`<div style="text-align:center">
                                                                <div class="d-flex justify-content-center">
                                                                    <div class="spinner-border" role="status">
                                                                            <span class="visually-hidden"></span>
                                                                    </div>
                                                                </div>
                                                            </div>`);
                                }
                             });                            
                        }

                        function musicales() {
                            remove();
                            document.getElementById("nav_musicales").className += " active";
                            document.getElementById("carpeta-activa").value = "musicales";
                            $("#shadow").fadeIn("normal");
                            $("#spinner").html(`<div class="container">
                                                    <div class="loader-container">
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    </div>
                                                </div>`);
                            $.ajax({
                                url: "../musicales/musicales.php",
                                type: "post",
                                success: function (response) {
                                    $("#shadow").fadeOut();
                                    $("#spinner").html(``);
                                    $("#all-body").html(response);
                                    listar_musicales(1);
                                }
                            });
                        }

                        function add_musicales() {
                            $("#buscador-general").hide().animate({ "opacity": "0"}, 0);
                            $("#musicales-result").hide().animate({ "opacity": "0", "bottom": "-80px" }, 0);
                            $.ajax({
                                url: "../musicales/add.php",
                                type: "post",
                                success: function (response) {
                                    $("#musicales-result").show().animate({ "opacity": "1", "bottom": "-80px" }, 1000);
                                    $("#musicales-result").html(response);
                        
                                    let form = document.getElementById("add_musicales");
                                    form.addEventListener("submit", function (event) {
                                        event.preventDefault();
                                        send_data("musicales", "Guardado", "add_insert", "add_musicales");
                                    });
                        
                                }, beforeSend: function () {
                                }
                            });
                        }

                        function edit_musicales(id) {
                            $("#buscador-general").hide().animate({ "opacity": "0"}, 0);
                            $("#musicales-result").hide().animate({ "opacity": "0", "bottom": "-80px" }, 0);
                        
                            var parametros = {
                                "id": id
                            }
                        
                            $.ajax({
                                data: parametros,
                                url: "../musicales/edit.php",
                                type: "post",
                                success: function (response) {
                                    $("#musicales-result").show().animate({ "opacity": "1", "bottom": "-80px" }, 1000);
                                    $("#musicales-result").html(response);
                        
                                    let form = document.getElementById("edit_musicales");
                                    form.addEventListener("submit", function (event) {
                                        event.preventDefault();
                                        send_data("musicales", "Actualizado", "edit_insert", "edit_musicales");
                                    });
                        
                                }
                            });
                        }

                        $("#modal_eliminar_musicales").on("show.bs.modal", function (e) {
                            var id = $(e.relatedTarget).data().id;
                            $("#id_musicales").val(id);
                        });

                        function borrar_musicales(id) {

                            $("#shadow").fadeIn("normal");
                            $("#spinner").html(`<div class="spinner-container">
                                                    <div class="spinner-path">
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                    </div>
                                                </div>`);
                        
                            var parametros = {
                                "id": id
                            }
                        
                            $.ajax({
                                data: parametros,
                                url: "../musicales/eliminar.php",
                                type: "post",
                                success: function (response) {
                                    $("#shadow").fadeOut();
                                    $("#spinner").html(``);
                                    if (response == 1) {
                                        alertify.success("Registro eliminado");
                                        listar_musicales(pag);
                                    } else if (response == 2) {
                                        alertify.error("Error");
                                    }
                                }
                            });
                        
                        }
            