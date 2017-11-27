<?php
    require('../config/config.php');
    require('../config/db.php');

    //Check For Submit
    if(isset($_POST['submit'])){
        //echo 'Submitted';
        //Get from data
        $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $judul = mysqli_real_escape_string($conn, $_POST['judul']);
        $pengarang = mysqli_real_escape_string($conn, $_POST['pengarang']);
        $penerbit = mysqli_real_escape_string($conn, $_POST['penerbit']);
        $tahun = mysqli_real_escape_string($conn, $_POST['tahun_terbit']);

        $query = "UPDATE buku SET
                    id_buku='$id',
                    judul='$judul',
                    pengarang='$pengarang',
                    penerbit='$penerbit',
                    tahun_terbit='$tahun'
                        WHERE id_buku = {$update_id}";
        //die($query); //untuk nge-check
        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'buku/data_buku.php');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }
    }

     // get ID
    $id = mysqli_real_escape_string($conn, $_GET['id_buku']);
    
    //Create Query
    $query = 'SELECT * FROM buku WHERE id_buku = '.$id;
   
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
        <h1 style="margin: 10px 10px 15px;">Edit Data Buku</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>ID Buku</label>
                <input type="text" name="id" class="form-control" value="<?php echo $data['id_buku']; ?>">
            </div>
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>">
            </div>
            <div class="form-group">
                <label>Pengarang</label>
                <input type="text" name="pengarang" class="form-control" value="<?php echo $data['pengarang']; ?>">
            </div>
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control" value="<?php echo $data['penerbit']; ?>">
            </div>
            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="text" name="tahun_terbit" class="form-control" value="<?php echo $data['tahun_terbit']; ?>">
            </div>            
            <input type="hidden" name="update_id" value="<?php echo $data['id_buku']; ?>">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
<?php include('../inc/footer.php'); ?>
