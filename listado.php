<?php
//echo 'test';

$Condicion = $_GET["Condicion"];

//Configuracion de la conexion a base de datos

/*
$bd_host = "localhost"; 
$bd_usuario = "homero_home"; 
$bd_password = ")[iTp+gP_}x9"; 
$bd_base = "homero_producto"; 
$con = mysqli_connect($bd_host, $bd_usuario, $bd_password,$bd_base); 
mysqli_select_db($con,$bd_base); 
$sql=mysqli_query("CALL ListarProductos()",$con);

while($row = mysqli_fetch_array($sql)){
 echo "<p>".$row['Nombre']." - ".$row['Tamanio']." - ".$row['Modelo']."</p> \n";
}
*/

$con = mysqli_connect("localhost", "homero_home", ")[iTp+gP_}x9", "homero_producto");
mysqli_set_charset($con, "utf8");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}


//mysqli_query($conn,"SET CHARACTER SET 'utf8'");
//mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");

// Return name of current default database
/*
if ($result = mysqli_query($con, "SELECT DATABASE()")) {
  $row = mysqli_fetch_row($result);
  echo "Default database is " . $row[0];
  mysqli_free_result($result);
}
*/

// Change db to "test" db
mysqli_select_db($con, "homero_producto");

// Return name of current default database
/* if ($result = mysqli_query($con, "CALL ListarProductos()")) {
  $row = mysqli_fetch_row($result);
  //echo "Default database is " . $row[0];
  mysqli_free_result($result);
} */


if ($result = mysqli_query($con, "CALL ListarProductos('$Condicion')")) {
  // Fetch one and one row
  $Cont = "";

  if ($Condicion == 4) {
    while ($row = mysqli_fetch_row($result)) {
        $Cont = $Cont . '<tr><td class="text-truncate" style="text-align: center">' . $row[0] . '</td>
        <td class="text-truncate">' . $row[2] . '</td>
        <td class="text-truncate" style="text-align: center">' . $row[4] . '</td>
        <td class="text-truncate" style="text-align: center">' . $row[6] . '</td>
        <td class="text-truncate" style="text-align: center">' . $row[7] . '</td>                                                                                                                                                                                       
        </tr>';
      //$Cont = '<td class="text-truncate">'.$row[0].'</td>'.$row[1],$row[2].$row[3],$row[4].$row[5],$row[6].$row[7];
    }
  } else if ($Condicion == 5) {
    while ($row = mysqli_fetch_row($result)) {
      $Cont = $Cont . '<tr><td class="text-truncate" style="text-align: center">' . $row[0] . '</td>
      <td class="text-truncate">' . $row[2] . '</td>
      <td class="text-truncate" style="text-align: center">' . $row[4] . '</td>
      <td class="text-truncate" style="text-align: center">' . $row[6] . '</td>
      <td class="text-truncate" style="text-align: center">' . $row[7] . '</td>                                                                                                                                                                                       
      </tr>';
    }
  } else {
      while ($row = mysqli_fetch_row($result)) {
        $Cont = $Cont . '<tr><td class="text-truncate" style="text-align: center">' . $row[0] . '</td>
        <td class="text-truncate">' . $row[2] . '</td>
        <td class="text-truncate">' . $row[3] . '</td>
        <td class="text-truncate" style="text-align: center">' . $row[4] . '</td>
        <td class="text-truncate" style="text-align: center">' . $row[5] . '</td>
        <td class="text-truncate" style="text-align: center">' . $row[6] . '</td>
        <td class="text-truncate" style="text-align: center">' . $row[7] . '</td>                                                                                                                                                                                       
        </tr>';        
      }
  }


  echo $Cont;
  // Free result set
  mysqli_free_result($result);
}


// Close connection
mysqli_close($con);
