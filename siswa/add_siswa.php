<?php
    require('../config/config.php');
    require('../config/db.php');

    //Check For Submit
    if(isset($_POST['submit'])){
        //echo 'Submitted';
        //Get from data
        $nis = mysqli_real_escape_string($conn, $_POST['nis']);
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

        $query = "INSERT INTO siswa(nis, nama_siswa, alamat_siswa) VALUES('$nis', '$nama', '$alamat')";

        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'siswa/data_siswa.php');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }


    }
?>

<?php include('../inc/header.php'); ?>
    <div class="container">
        <h1 style="margin: 10px 10px 15px;">Isi Data Lengkap Siswa</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>NIS</label>
                <input type="text" name="nis" class="form-control">
            </div>
            <div class="form-group">
                <label>Nama Siswa</label>
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
