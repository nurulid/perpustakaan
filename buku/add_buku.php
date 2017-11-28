<?php
    require('../config/config.php');
    require('../config/db.php');

    //Check For Submit
    if(isset($_POST['submit'])){
        //echo 'Submitted';
        //Get from data
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $judul = mysqli_real_escape_string($conn, $_POST['judul']);
        $pengarang = mysqli_real_escape_string($conn, $_POST['pengarang']);
        $penerbit = mysqli_real_escape_string($conn, $_POST['penerbit']);
        $tahun = mysqli_real_escape_string($conn, $_POST['tahun_terbit']);

        $query = "INSERT INTO buku(id_buku, judul, pengarang, penerbit, tahun_terbit) VALUES('$id', '$judul', '$pengarang', '$penerbit', '$tahun')";

        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'buku/data_buku.php');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }


    }
?>

<?php include('../inc/header.php'); ?>
    <div class="container">
        <h1 style="margin: 10px 10px 15px;">Isi Data Lengkap Buku</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <!-- <div class="form-group">
                <label>ID Buku</label>
                <input type="text" name="id" class="form-control">
            </div> -->
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control">
            </div>
            <div class="form-group">
                <label>Pengarang</label>
                <input type="text" name="pengarang" class="form-control">
            </div>
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control">
            </div>
            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="text" name="tahun_terbit" class="form-control">
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
<?php include('../inc/footer.php'); ?>
