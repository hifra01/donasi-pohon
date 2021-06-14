<?php $data['judul'] = "404" ?>
<?php require_once "./app/views/templates/dashboard/header.php"; ?>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="page-error">
                <div class="page-inner">
                    <h1>404</h1>
                    <div class="page-description">
                        Halaman tidak ditemukan.
                    </div>
                </div>
            </div>
            <div class="simple-footer">
                <a href="<?= BASEURL; ?>"><i class="fa fa-home"></i> Kembali ke Beranda</a>
            </div>
        </div>
    </section>
</div>

<?php require_once "./app/views/templates/dashboard/scripts.php"; ?>
<?php require_once "./app/views/templates/dashboard/footer.php"; ?>
