        
            function send_data(carpeta, msg, tipo,nombre_form) {

                $("#shadow").fadeIn("normal");
                $("#spinner").html(`<div class='spinner-container'>
                                        <div class="spinner-path">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        </div>
                                    </div>`);
                const peticion = new XMLHttpRequest();
                var data = new FormData();
                data = getFormData(nombre_form, data);
                for (var value of data.values()) {
                    console.log(value);
                }
                peticion.open("POST", "../"+carpeta+"/"+tipo+".php");
                peticion.send(data);
                peticion.onload = function () {
                
                    console.log("respuesta:" + this.responseText);
                    if(this.responseText==1){
                        alertify.success(msg);
                        var carpeta_activa = document.getElementById("carpeta-activa").value;

                         if(carpeta_activa=="karaokes"){
                                        listar_karaokes(1);
                                    }                                                                        
                                  
                                else if(carpeta_activa=="usuarios"){
                                    listar_usuarios(1);
                                }             
                                  
                                else if(carpeta_activa=="musicales"){
                                    listar_musicales(1);
                                }             
                                
                        $("#buscador-general").show().animate({ "opacity": "1"}, 1000);
                    }else if(this.responseText==2){
                        alertify.error('Error');
                    }else if(this.responseText==7){
                        alertify.error('Registro repetido');
                    }

                    $("#shadow").fadeOut();
                    $("#spinner").html(``);

                }; 

            };


            function getFormData(id, data) {

            $("#" + id).find("input,select").each(function (i, v) {
                if (v.type !== "file") {
                    if (v.type === "checkbox" && v.checked === true) {
                        data.append(v.name, "on");
                    } else {
                        console.log("nombre:" + v.name + "-- valor:" + v.value);
                        data.append(v.name, v.value);
                    }
                }
            });
            return data;
            }
