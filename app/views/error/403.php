<?php $data['judul'] = "403" ?>
<?php require_once "./app/views/templates/dashboard/header.php"; ?>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="page-error">
                <div class="page-inner">
                    <h1>403</h1>
                    <div class="page-description">
                        Anda tidak memiliki izin untuk mengakses halaman ini.
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
