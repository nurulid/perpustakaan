<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container">
    <a class="navbar-brand" href="#">Perpustakaan SD ABC</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01" style="">
    <ul class="navbar-nav mr-auto">
        <li>
        <a class="nav-link" href="<?php echo ROOT_URL; ?>">Home</a>
        </li>
        <li>
        <a class="nav-link" href="<?php echo ROOT_URL; ?>./petugas/data_petugas.php">Petugas</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">Buku</a>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item" href="<?php echo ROOT_URL; ?>./buku/data_buku.php">Data Buku</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL; ?>./peminjaman/data_peminjaman.php">Peminjaman</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL; ?>./pengembalian/data_pengembalian.php">Pengembalian</a>
                </div>
        </li>
        <li>
        <a class="nav-link" href="<?php echo ROOT_URL; ?>./siswa/data_siswa.php">Siswa</a>
        </li>
        
    </ul>
    </div>
</div>
</nav>