<?php
function getDb(){
$db_host="localhost";
$db_name="cms";
$db_user="cms_admin";
$db_pass="b9lF7T4VsuincKRu";

$db_conn=mysqli_connect($db_host, $db_user, $db_pass,$db_name);


if(mysqli_connect_error()){
  echo mysqli_connect_error();
  exit;
}
return $db_conn;
}
?>
