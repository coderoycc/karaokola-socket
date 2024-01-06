        
      <?php
                
                include("../conexion.php");
                $texto=$_POST['texto'];
                $start_from=$_POST['start'];
                $search_in_sql="";
                if(!empty($texto)){
                    $search_in_sql=" WHERE (titulo like '%".$texto."%'  OR interprete like '%".$texto."%'  OR ruta like '%".$texto."%' )";
                }
                $sql=" SELECT * FROM tblMusicales $search_in_sql ORDER BY idMusicales DESC offset $start_from ROWS FETCH NEXT 20 ROWS ONLY";
                $query=sqlsrv_query($con,$sql);      
                $count_row=sqlsrv_has_rows($query);
                if($count_row===false){
                    echo "<div style='text-align:center'><h2>Lista de Musicales vacia!</h2></div>";
                }else{       

                    $resultado="<div >
                    <table style='text-align:center' class='table table-hover'>
                            <tr>
                                <th>
                                    Información      
                                </th>
                                  
                                <th>
                                    Opciones
                                </th>
                            </tr>
                    ";

                $t=time();
                while($row=sqlsrv_fetch_array($query)){ 

                    $id=$row['idMusicales'];
                    $expand="expand";
                    $sector="sector".$id;
                      $url="";  
                    $otro="    
                                    <div id='sector".$id."' class='email' onclick='this.classList.add(\"$expand\")'>
                                        <div class='from'>
                                            <div class='from-contents'>
                                            <div class='avatar me' style='background-image: url($url)'></div>
                                            <div class='name'>".$row['titulo']."</div>
                                            </div>
                                        </div>
                                        <div class='to'>
                                            <div class='to-contents'>
                                            <div class='top'>
                                                <div class='avatar-large me' style='background-image: url()'></div>
                                                <div class='name-large'>".$row['titulo']."</div>
                                                <div class='x-touch' onclick='document.getElementById(\"$sector\").classList.remove(\"$expand\");event.stopPropagation();'>
                                                <div class='x'>
                                                    <div class='line1'></div>
                                                    <div class='line2'></div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='bottom'>
                                                <div class='row2'>

                                                        

                                                        <div class='table-responsive'>
                                                                <table style='margin:5px auto; width: 85%; border-collapse: separate;border:hidden;' class='table tdstyle' border='1' >  
                                                                                 
                                    <tr>
                                        <td >Titulo</td>
                                        <td >".$row["titulo"]."</td>
                                    </tr>
                             
                                    <tr>
                                        <td >Interprete</td>
                                        <td >".$row["interprete"]."</td>
                                    </tr>
                             
                                    <tr>
                                        <td >Ruta</td>
                                        <td >".$row["ruta"]."</td>
                                    </tr>
                                                                                                        
                                                                </table>  
                                                            </div> 
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    ";


                    $resultado.=" <tr style='cursor:pointer'>
                                            <td>
                                                ".$otro."
                                            </td>
                                            
                                            <td>
                                                <button class='btn btn-danger' data-toggle='modal' data-target='#modal_eliminar_musicales' data-id='".$row['idMusicales']."'> <i class='fas fa-trash'></i></button>
                                                
                                            </td>
                                      </tr>
                            ";

                    }

                    $resultado.="
                                </table>
                            </div>
                            
                    ";
    
                    echo $resultado;          
            }

        ?>
