<?php
    require('../config/config.php');
    require('../config/db.php');

    //Check For Submit
    if(isset($_POST['submit'])){
        //echo 'Submitted';
        //Get from data
        $id_pinjam = mysqli_real_escape_string($conn, $_POST['id_pinjam']);
        $nis = mysqli_real_escape_string($conn, $_POST['nis']);
        $id_buku = mysqli_real_escape_string($conn, $_POST['id_buku']);
        $pinjam = mysqli_real_escape_string($conn, $_POST['tgl_pinjam']);
        $kembali = mysqli_real_escape_string($conn, $_POST['tgl_kembali']);

        $query = "INSERT INTO peminjaman(id_pinjam, nis, id_buku, tgl_pinjam, tgl_kembali) VALUES('$id_pinjam', '$nis', '$id_buku', '$pinjam', '$kembali')";

        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'peminjaman/data_peminjaman.php');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }
    }
    
    $_pinjam = strtotime('today');
    $_kembali = strtotime('+8 Days');
?>

<?php include('../inc/header.php'); ?>
    <div class="container" style="margin-bottom: 20px;">
        <h1 style="margin: 10px 10px 15px;">Isi Data Peminjaman Buku</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>ID Peminjaman</label>
                <input type="text" name="id_pinjam" class="form-control">
            </div>
            <div class="form-group">
                <label>Nomor Induk Siswa</label>
                <input type="text" onkeyup="isi_nama()" name="nis" id="nis" class="form-control" >
            </div>
            <div class="form-group">
                <label class="sr-only">Nama Siswa</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Siswa" disabled>
            </div>
            <div class="form-group">
                <label>ID Buku</label>
                <input type="text" onkeyup="isi_judul()" name="id_buku" id="id_buku"  class="form-control" >
            </div>
            <div class="form-group">
                <label class="sr-only">Judul Buku</label>
                <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Buku" disabled>
            </div>
            <div class="form-group">
                <label>Buku di pinjam pada tanggal</label>
                <input type="text" name="tgl_pinjam" class="form-control" value="<?php echo date('Y-m-d', $_pinjam); ?>" hidden>
                <input type="text" name="tgl_pinjam_muncul" class="form-control" value="<?php echo date('d M Y', $_pinjam) ;?>" disabled>
            </div>
            <div class="form-group">
                <label>Harus dikembalikan sebelum tanggal</label>
                <input type="text" name="tgl_kembali" class="form-control" value="<?php echo date('Y-m-d', $_kembali); ?>" hidden>
                <input type="text" name="tgl_kembali_muncul" class="form-control" value="<?php echo date('d M Y', $_kembali); ?>" disabled>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
    <!-- <script src="<?php echo ROOT_URL; ?>js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo ROOT_URL; ?>js/main.js"></script> -->
<?php include('../inc/footer.php'); ?>
