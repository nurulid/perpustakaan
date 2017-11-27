<?php
    require('../config/config.php');
    require('../config/db.php');

    //Check For Submit
    if(isset($_POST['submit'])){
        //echo 'Submitted';
        //Get from data
        $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
        $id_pinjam = mysqli_real_escape_string($conn, $_POST['id_pinjam']);
        $nis = mysqli_real_escape_string($conn, $_POST['nis']);
        $id_buku = mysqli_real_escape_string($conn, $_POST['id_buku']);
        $pinjam = mysqli_real_escape_string($conn, $_POST['tgl_pinjam']);
        $kirim = mysqli_real_escape_string($conn, $_POST['tgl_kirim']);

        $query = "UPDATE peminjaman SET
                    id_pinjam='$id_pinjam',
                    nis='$nis',
                    id_buku='$id_buku',
                    tgl_pinjam='$pinjam',
                    tgl_kirim='$kirim'
                        WHERE id_pinjam = {$update_id}";
        //die($query); //untuk nge-check
        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'peminjaman/data_peminjaman.php');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }
    }

     // get ID
    $id = mysqli_real_escape_string($conn, $_GET['id_pinjam']);
    
    //Create Query
    $query = 'SELECT * ,
                (select nama_siswa from siswa where nis = peminjaman.nis) as nama_siswa,
                (select judul from buku where id_buku = peminjaman.id_buku) as judul
                FROM peminjaman WHERE id_pinjam = '.$id;
   
    //Get Result
    $result = mysqli_query($conn, $query);

    //Fetch Data
    $data = mysqli_fetch_assoc($result);
    //var_dump($posts);

    //Free Result
    mysqli_free_result($result);

    //Close Connection
    mysqli_close($conn);
?>

<?php include('../inc/header.php'); ?>
    <div class="container" style="margin-bottom: 20px;">
        <h1 style="margin: 10px 10px 15px;">Edit Data Buku</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>ID Pinjam</label>
                <input type="text" name="id_pinjam" class="form-control" value="<?php echo $data['id_pinjam']; ?>">
            </div>
            <div class="form-group">
                <label>Nomor Induk Siswa</label>
                <input type="text" onkeyup="isi_nama()" name="nis" id="nis" class="form-control" value="<?php echo $data['nis']; ?>">
            </div>
            <div class="form-group">
                <label class="sr-only">Nama Siswa</label>
                <input type="text" name="nama_siswa" id="nama" class="form-control" value="<?php echo $data['nama_siswa']; ?>" disabled>
            </div>
            <div class="form-group">
                <label>ID Buku</label>
                <input type="text" onkeyup="isi_judul()" name="id_buku" id="id_buku" class="form-control" value="<?php echo $data['id_buku']; ?>">
            </div>
            <div class="form-group">
                <label class="sr-only">Judul Buku</label>
                <input type="text" name="judul" id="judul" class="form-control" value="<?php echo $data['judul']; ?>" disabled>
            </div>
            <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input type="text" name="tgl_pinjam_muncul" class="form-control" value="<?php echo $data['tgl_pinjam']; ?>" disabled>
            </div>
            <div class="form-group">
                <label>Tanggal Kembali</label>
                <input type="text" name="tgl_kembali" class="form-control" value="<?php echo  $data['tgl_kembali']; ?>" disabled>
            </div>            
            <input type="hidden" name="update_id" value="<?php echo $data['id_pinjam']; ?>">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
<?php include('../inc/footer.php'); ?>
