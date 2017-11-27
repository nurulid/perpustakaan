<?php
    require('../config/config.php');
    require('../config/db.php');

    //tampil data
    //Create Query
    $query = 'SELECT * FROM siswa ORDER BY nama_siswa ASC';
    $no=1;
    //Get Result
    $result = mysqli_query($conn, $query);

    //Fetch Data
    $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($posts);

    //Free Result
    mysqli_free_result($result);

    ///////////////////////////////////////////////////////
    //delete
    //Check For Submit
    if(isset($_POST['delete'])){
        //echo 'Submitted';
        //Get from data
        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

        $query = "DELETE FROM siswa WHERE nis = {$delete_id}";
        //die($queryy); //untuk nge-check
        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'siswa/data_siswa.php');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }
    }


?>

<?php include('../inc/header.php'); ?>
    <div class="container">
        <h1  style="margin: 10px 10px 15px; display: inline-block;">Data <span class="text-primary">Siswa</span> SD ABC</h1>
        <a href="add_siswa.php" class="btn btn-outline-primary" style="margin-top: 15px; float: right;">Tambah</a>
        <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
            <th>No.</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Alamat</th>
            <th>Aksi</th>
            </tr>
        </thead>
        
    
            <?php foreach($datas as $data) : ?>
            <tbody>
                <tr class="table-success">
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['nama_siswa']; ?></td>
                <td><?php echo $data['alamat_siswa']; ?></td>
                <td>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <a href="<?php echo ROOT_URL; ?>siswa/edit_siswa.php?nis=<?php echo $data['nis']; ?>" class="btn btn-primary btn-sm " style="margin: 3px 0;">Edit</a>
                    <input type="hidden" name="delete_id" value="<?php echo $data['nis']; ?>">
                    <input type="submit" name="delete" value="Delete" class="btn btn-outline-secondary btn-sm" Onclick="return confirm('Apakah anda yakin untuk menghapus data siswa yang bernama <?php echo $data['nama_siswa']?>?')" style="margin: 3px 0;">
                </form>
                </td>
                </tr>
            </tbody>
            <?php $no++; ?>
            <?php endforeach; ?>
            </table>     
    </div>
<?php include('../inc/footer.php'); ?>
