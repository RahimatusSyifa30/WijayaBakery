<div class="conta" style="display: none;">
    <div class="card profil p-2 border border-warning border-2 text-center bakery ">
        <div class="justify-content-center d-flex p-2">
            <h4 class="card-title ">Akun</h4>
        </div>
        <button type="button" id="btn-close" class="btn-close position-absolute p-2" aria-label="Close"></button>
        <?php if (session()->get('isLoggedIn')) { ?>
            <div class="container rounded-5 p-2 bg-warning bg-opacity-10">
                <img src="<?= base_url('image/prof/') ?><?= session()->get('foto-prof') ?>" alt="" class="foto-prof m-auto">
                <p class="mt-1">Selamat Datang, <strong><?= session()->get('nama') ?></strong></p>
            </div>
            <div class="p-4 d-flex flex-column">

                <a href="<?= base_url('akun_detail') ?>" class="text-decoration-none btnhover mb-2 mt-1">Lihat Akun</a>
                <a href="<?= base_url('pesanan_saya') ?>" class="text-decoration-none btnhover mb-2">Pesanan saya</a>
                <a href="<?= base_url('riwayat_transaksi') ?>" class="text-decoration-none btnhover mb-4">Riwayat Transaksi</a>
                <a href="<?= base_url('logout') ?>" class="btn btn-danger mt-2">Log Out</a>
            </div>

        <?php } else if (session()->get('isLoggedInAdmin')) { ?>
            <div class="container rounded-5 p-2 bg-warning bg-opacity-10">
                <img src="<?= base_url('image/prof/') ?><?= session()->get('foto-prof')  ?>" alt="" class="foto-prof m-auto">
                <p class="mt-1">Selamat Datang, <strong><?= session()->get('nama') ?></strong></p>
            </div>
            <div class="p-4 d-flex flex-column">

                <a href="<?= base_url('akun_detail') ?>" class="text-decoration-none btnhover mb-2">Lihat Akun</a>
                <a href="<?= base_url('admin') ?>" class="text-decoration-none btnhover mb-2">Menu Admin</a>
                <!-- <a href="<?= base_url('riwayat_transaksi') ?>" class="text-decoration-none btnhover mb-4">Riwayat Transaksi</a> -->
                <a href="<?= base_url('logout') ?>" class="btn btn-danger mt-2">Log Out</a>
            </div>

        <?php } else { ?>
            <a href="<?= base_url('login') ?>" class="btn bg-btnhover">Login</a>
            <br>
            <p>Belum punya akun? Daftar pakai nomor HP dan KTP saja</p>
            <a href="<?= base_url('registrasi') ?>" class="btn bg-btnhover">Buat akun</a>
        <?php } ?>
    </div>
</div>