<?php
require('../config/config.php');
require('../config/db.php');

$nis = $_GET['nis'];
$query = mysqli_query($conn, "select * from siswa where nis='$nis'");
$siswa = mysqli_fetch_array($query);
$data = array(
            'nama_sis'      =>  $siswa['nama_siswa']);
 echo json_encode($data);
?>