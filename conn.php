<?php 
include "config.php";

$conn = mysqli_connect(
    $cfg["mysql_conn"]["host"], 
    $cfg["mysql_conn"]["user"], 
    $cfg["mysql_conn"]["pass"], 
    $cfg["mysql_conn"]["db"]);
  
if(!$conn){
    echo "<script>alert('Koneksi Gagal')</script>" . mysqli_connect_error();
} else {
}
?>
