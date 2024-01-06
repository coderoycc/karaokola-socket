        
<?php

include("../conexion.php");
if (isset($_POST['texto']) && strlen(trim($_POST['texto'])) > 0) {
  $texto = trim($_POST['texto']);
} else {
  $texto = '';
}

if (isset($_POST['start'])) {
  $start_from = intval($_POST['start']);
} else {
  $start_from = 0;
}

$search_in_sql = "";
if (!empty($texto)) {
  $search_in_sql = " AND (titulo like '%" . $texto . "%'  OR interprete like '%" . $texto . "%'  OR ruta like '%" . $texto . "%' )";
}
$sql = " SELECT * FROM tblCanciones WHERE tipo LIKE 'KARAOKE' $search_in_sql ORDER BY idCancion DESC LIMIT $start_from, 20";

$conn = db();
$stmt = $conn->prepare($sql);
$stmt->execute();


// print_r($result);

if ($stmt->rowCount() === 0) {
  echo "<div style='text-align:center'><h2>Lista de Karaokes vacia!</h2></div>";
} else {

  $resultado = "<div >
<table style='text-align:center' class='table table-hover'>
<tr>
  <th>
    ID.   
  </th>
  <th>
    Intérprete
  </th>
  <th>
    Título
  </th>
  <th>
    Opciones
  </th>
</tr>";

  $t = time();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($result as $row) {
    // print_r($row);
    $id = $row['idCancion'];
    $interprete = $row['interprete'];
    $titulo = $row['titulo'];
    $url = "";
    $resultado .= "<tr style='cursor:pointer text-align:center;width:100%;margin:0 auto' class='table table-hover table-bordered table-dark table-responsive-sm'>
      <td>
      " . $id . "
      </td>
      <td>
      " . $interprete . "
      </td>
      <td>
      " . $titulo . "
      </td>
      <td>
        <button class='btn btn-warning' data-toggle='modal' data-target='#modal_eliminar_karaokes' data-titulo='" . $row['titulo'] . "' data-interprete='" . $row['interprete'] . "' data-id='" . $row['idCancion'] . "' data-ruta='".$row['ruta']."'> <B class=''>Elegir</B></button>
      </td>
    </tr>";
  }

  $resultado .= "
</table>
</div>

";

  echo $resultado;
}

?>
