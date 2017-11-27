<?php
    require('../config/config.php');
    require('../config/db.php');

    //Check For Submit
    if(isset($_POST['submit'])){
        //echo 'Submitted';
        //Get from data
        $nip = mysqli_real_escape_string($conn, $_POST['nip']);
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

        $query = "INSERT INTO petugas(nip, nama_petugas, alamat_petugas) VALUES('$nip', '$nama', '$alamat')";

        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'petugas/data_petugas.php');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }


    }
?>

<?php include('../inc/header.php'); ?>
    <div class="container">
        <h1 style="margin: 10px 10px 15px;">Isi Data Lengkap Petugas</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control">
            </div>
            <div class="form-group">
                <label>Nama Petugas</label>
                <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
<?php include('../inc/footer.php'); ?>
