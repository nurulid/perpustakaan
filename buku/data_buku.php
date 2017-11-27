<?php
    require('../config/config.php');
    require('../config/db.php');

    //tampil data
    //Create Query
    $query = 'SELECT * FROM buku ORDER BY judul ASC';
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

        $query = "DELETE FROM buku WHERE id_buku = {$delete_id}";
        //die($queryy); //untuk nge-check
        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'buku/data_buku.php');
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }
    }


?>

<?php include('../inc/header.php'); ?>
    <div class="container">
        <h1  style="margin: 10px 10px 15px; display: inline-block;">Data <span class="text-primary">Buku</span> Perpustakaan SD ABC</h1>
        <a href="add_buku.php" class="btn btn-outline-primary" style="margin-top: 15px; float: right;">Tambah</a>
        <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
            <th>No.</th>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Aksi</th>
            </tr>
        </thead>
        
    
            <?php foreach($datas as $data) : ?>
            <tbody>
                <tr class="table-success">
                <td><?php echo $no; ?></td>
                <td><?php echo $data['id_buku']; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['pengarang']; ?></td>
                <td><?php echo $data['penerbit']; ?></td>
                <td><?php echo $data['tahun_terbit']; ?></td>
                <td>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <a href="<?php echo ROOT_URL; ?>buku/edit_buku.php?id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-primary btn-sm " style="margin: 3px 0;">Edit</a>
                    <input type="hidden" name="delete_id" value="<?php echo $data['id_buku']; ?>">
                    <input type="submit" name="delete" value="Delete" class="btn btn-outline-secondary btn-sm" Onclick="return confirm('Apakah anda yakin untuk menghapus data buku yang berjudul <?php echo $data['judul']?>?')" style="margin: 3px 0;">
                </form>
                </td>
                </tr>
            </tbody>
            <?php $no++; ?>
            <?php endforeach; ?>
            </table>     
    </div>
<?php include('../inc/footer.php'); ?>
