<?php
include_once('../config/config.php');
include_once('../config/db.php');

 $id = $_GET['id_pinjam'];
 $query = mysqli_query($conn, "select * ,
                                  (select nama_siswa from siswa where nis = peminjaman.nis) as nama_siswa,
                                  (select judul from buku where id_buku = peminjaman.id_buku) as judul
                                  from peminjaman where id_pinjam='$id'");
 $peminjaman = mysqli_fetch_array($query);
 $data = array(
             'nis'        =>  $peminjaman['nis'],
             'nama'       =>  $peminjaman['nama_siswa'],
             'id_buku'    =>  $peminjaman['id_buku'],
             'judul'      =>  $peminjaman['judul'],
             'pinjam'     =>  $peminjaman['tgl_pinjam'],
             'kembali'     =>  $peminjaman['tgl_kembali'],
             'kembali_str' =>  strtotime($peminjaman['tgl_kembali']));
  echo json_encode($data);
  //die(data)
?>