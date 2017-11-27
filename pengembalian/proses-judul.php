<?php
require('../config/config.php');
require('../config/db.php');

 $id = $_GET['id'];
 $query = mysqli_query($conn, "select * from buku where id_buku='$id'");
 $buku = mysqli_fetch_array($query);
 $data = array(
             'judul'      =>  $buku['judul']);
  echo json_encode($data);
?>