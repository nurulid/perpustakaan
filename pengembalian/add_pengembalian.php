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
        $denda = mysqli_real_escape_string($conn, $_POST['denda']);

        $query = "INSERT INTO peminjaman(id_pinjam, nis, id_buku, tgl_pinjam, tgl_kembali) VALUES('$id_pinjam', '$nis', '$id_buku', '$pinjam', '$kembali')";

        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'peminjaman/data_peminjaman.php');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }
    }
    
    $_kembali   = strtotime('today');

    // if(isset($_REQUEST['hitung'])){
    //     $tgl_kembali_str =  $_REQUEST['tgl_kembali_str'];
    //     $hariLewat = $_kembali - $tgl_kembali_str;
    //     if($hariLewat >= '‪86400‬'){
    //         $denda = (($_kembali - $tgl_kembali_str) / 86400) * 500 ;
    //     }else{
    //         $denda = (($_kembali - $tgl_kembali_str) / 86400) * 0 ;
    //     }
        
    // }
    
   
?>

<?php include('../inc/header.php'); ?>
    <div class="container" style="margin-bottom: 20px;">
        <h1 style="margin: 10px 10px 15px;">Isi Data Peminjaman Buku</h1>
        <form method="POST" name="kembali" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>ID Peminjaman</label>
                <input type="text" onkeyup="isi_pengembalian()" name="id_pinjam" id="id_pinjam" class="form-control">
            </div>
            <div class="form-group">
                <label>Nomor Induk Siswa</label>
                <input type="text" name="nis" id="nis" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label class="sr-only">Nama Siswa</label>
                <input type="text" name="nama" id="nama" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label>ID Buku</label>
                <input type="text" name="id_buku" id="id_buku"  class="form-control"  disabled>
            </div>
            <div class="form-group">
                <label class="sr-only">Judul Buku</label>
                <input type="text" name="judul" id="judul" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label>Buku di pinjam pada tanggal</label>
                <input type="text" name="tgl_pinjam" id="pinjam" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label>Batas tanggal buku harus dikembalikan pada</label>
                <input type="text"  name="tgl_kembali" id="kembali"  class="form-control" disabled>
                <input type="text" name="tgl_kembali_str" id="kembali_str" class="form-control sr-only">
            </div>
            <div class="form-group">
                <label>Buku dikembalikan pada tanggal</label>
                <input type="text" name="tgl_kembali_muncul" class="form-control" value="<?php echo date('d M Y', $_kembali); ?>" disabled>
                <input type="text" name="tgl_kembali_muncul" id="today" class="form-control sr-only" value="<?php echo $_kembali; ?>" disabled>
            </div>
            <div class="form-group">
                <label>Denda</label>
                <input type="text" name="denda" id="denda" class="form-control"  disabled>
            </div>
            <input type="button" name="hitung" id="hitung" class="btn btn-info" value="Hitung Denda">
            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
   
<?php include('../inc/footer.php'); ?>
