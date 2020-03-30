<?php

$Correo = $_POST["Correo"];
$Ip =  0;

function getRealIP()
{
    if (isset($_SERVER["HTTP_CLIENT_IP"]))
    {
        return $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
    {
        return $_SERVER["HTTP_X_FORWARDED"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED"]))
    {
        return $_SERVER["HTTP_FORWARDED"];
    }
    else
    {
        return $_SERVER["REMOTE_ADDR"];
    }
}

$Ip = getRealIP();


$con = mysqli_connect("localhost", "tortasdrossicom_homero", "&O3hu4@c3.Ti", "tortasdrossicom_producto");
mysqli_set_charset($con, "utf8");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}

mysqli_select_db($con, "tortasdrossicom_producto");

$result = mysqli_query($con, "CALL InsertaCorreo('$Correo','$Ip')");
//$row = mysqli_fetch_row($result);
//echo $row;
echo '1';

// Close connection
mysqli_close($con);


?>