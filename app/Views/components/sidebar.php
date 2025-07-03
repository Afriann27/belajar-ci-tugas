<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="/">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li><!-- End Home Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'keranjang') ? "" : "collapsed" ?>" href="<?= base_url('keranjang') ?>">
                <i class="bi bi-cart-check"></i>
                <span>Keranjang</span>
            </a>
        </li><!-- End Keranjang Nav -->

        <!-- Tambahkan Menu Kategori di sini -->
        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'kategori') ? "" : "collapsed" ?>" href="<?= base_url('kategori') ?>">
                <i class="bi bi-tags"></i>
                <span>Kategori</span>
            </a>
        </li><!-- End Kategori Nav -->

        <?php if (session('role') === 'admin'): ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/diskon') ?>">
            <i class="bi bi-cash-coin"></i> Diskon
        </a>
    </li>
<?php endif; ?>


        <?php if (session()->get('role') == 'admin') { ?>
            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="<?= base_url('produk') ?>">
                    <i class="bi bi-receipt"></i>
                    <span>Produk</span>
                </a>
            </li><!-- End Produk Nav -->
        <?php 
        } 
        ?>

        <li class="nav-item">
    <a class="nav-link <?php echo (uri_string() == 'profile') ? "" : "collapsed" ?>" href="profile">
        <i class="bi bi-person"></i>
        <span>Profile</span>
    </a>
</li><!-- End Profile Nav -->
       


    </ul>

</aside><!-- End Sidebar-->