<?php
    require('../config/config.php');
    require('../config/db.php');

    //Check For Submit
    if(isset($_POST['submit'])){
        //echo 'Submitted';
        //Get from data
        $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
        $nip = mysqli_real_escape_string($conn, $_POST['nip']);
        $nama_petugas = mysqli_real_escape_string($conn, $_POST['nama_petugas']);
        $alamat_petugas = mysqli_real_escape_string($conn, $_POST['alamat_petugas']);

        $query = "UPDATE petugas SET
                    nip='$nip',
                    nama_petugas='$nama_petugas',
                    alamat_petugas='$alamat_petugas'
                        WHERE nip = {$update_id}";
        //die($query); //untuk nge-check
        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'petugas/data_petugas.php');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }
    }

     // get ID
    $id = mysqli_real_escape_string($conn, $_GET['nip']);
    
    //Create Query
    $query = 'SELECT * FROM petugas WHERE nip = '.$id;

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
        <h1 style="margin: 10px 10px 15px;">Edit Data Petugas</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="<?php echo $data['nip']; ?>">
            </div>
            <div class="form-group">
                <label>Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control" value="<?php echo $data['nama_petugas']; ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat_petugas" class="form-control"><?php echo $data['alamat_petugas']; ?></textarea>
            </div>
            <input type="hidden" name="update_id" value="<?php echo $data['nip']; ?>">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
<?php include('../inc/footer.php'); ?>
