<nav class="navbar navbar-default">
<div class="container">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">Perpustakaan SD ABC</a>
        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mydropdown">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="mydropdown">
    <ul class="nav navbar-nav">
        <li>
        <a href="<?php echo ROOT_URL; ?>">Home</a>
        </li>
        <li>
        <a href="<?php echo ROOT_URL; ?>./petugas/data_petugas.php">Petugas</a>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">Buku</a>
                <ul class="dropdown-menu">
                    <li>
                    <a href="<?php echo ROOT_URL; ?>./buku/data_buku.php">Data Buku</a>
                    </li>
                    <li>
                    <a href="<?php echo ROOT_URL; ?>./peminjaman/data_peminjaman.php">Peminjaman</a>
                    </li>
                    <li>
                    <a href="<?php echo ROOT_URL; ?>./pengembalian/data_pengembalian.php">Pengembalian</a>
                    </li>
                </ul>
        </li>
        <li>
        <a href="<?php echo ROOT_URL; ?>./siswa/data_siswa.php">Siswa</a>
        </li>
    </div>
</div>
</nav>