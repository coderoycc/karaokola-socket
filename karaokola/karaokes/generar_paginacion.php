    
<?php

include("../conexion.php");
ob_start();
$texto = $_POST['texto'];

$search_in_sql = "";
if (!empty($texto)) {
  $search_in_sql = " AND (titulo like '%" . $texto . "%'  OR interprete like '%" . $texto . "%'  OR ruta like '%" . $texto . "%' )";
}

$conn = db();
$sql = "SELECT COUNT(idCanciones) as cantidad FROM tblCanciones WHERE tipo LIKE 'KARAOKE' $search_in_sql";
$stmt = $conn->prepare($sql);
$stmt->execute();

$total_records = $stmt->fetchColumn();
$total_pages = ceil($total_records / 20);

$table = "<nav style='display: inline-block; list-style-type: none;margin:10px'><ul class='pagination' style='margin:0px'>";

for ($i = 1; $i <= $total_pages; $i++) {

  if ($texto != "") {
    $table .= "
                            <li><a href='index.php?page=" . $i . "&busqueda=" . $texto . "'>" . $i . "</a></li>";
  } else {
    $table .= "
                        <li><a href='index.php?page=" . $i . "'>" . $i . "</a></li>";
  }
};
$table .= "</ul></nav>";

$mensaje = array('tabla' => $table, 'records' => $total_records);
ob_end_clean();
echo json_encode($mensaje);
?>    
