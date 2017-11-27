<?php
    require('../config/config.php');
    require('../config/db.php');

    //Check For Submit
    if(isset($_POST['submit'])){
        //echo 'Submitted';
        //Get from data
        $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
        $nis = mysqli_real_escape_string($conn, $_POST['nis']);
        $nama_siswa = mysqli_real_escape_string($conn, $_POST['nama_siswa']);
        $alamat_siswa = mysqli_real_escape_string($conn, $_POST['alamat_siswa']);

        $query = "UPDATE siswa SET
                    nis='$nis',
                    nama_siswa='$nama_siswa',
                    alamat_siswa='$alamat_siswa'
                        WHERE nis = {$update_id}";
        //die($query); //untuk nge-check
        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'siswa/data_siswa.php');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }
    }

     // get ID
    $id = mysqli_real_escape_string($conn, $_GET['nis']);
    
    //Create Query
    $query = 'SELECT * FROM siswa WHERE nis = '.$id;

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
    <div class="container">
        <h1 style="margin: 10px 10px 15px;">Edit Data Siswa</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>NIS</label>
                <input type="text" name="nis" class="form-control" value="<?php echo $data['nis']; ?>">
            </div>
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" value="<?php echo $data['nama_siswa']; ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat_siswa" class="form-control"><?php echo $data['alamat_siswa']; ?></textarea>
            </div>
            <input type="hidden" name="update_id" value="<?php echo $data['nis']; ?>">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
<?php include('../inc/footer.php'); ?>
