<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= BASEURL; ?>assets/dashboard/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>assets/dashboard/css/components.css">
</head>

<body>
<div id="app">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <a href="<?= BASEURL ?>" class="navbar-brand sidebar-gone-hide">Donasi Pohon</a>
    </nav>
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        <div class="card-header"><h4>Register</h4></div>

                        <div class="card-body">
                            <form method="POST" action="<?= BASEURL;?>auth/registration" class="needs-validation" novalidate="">
                                <div class="form-group">
                                    <label for="fullname">Nama Lengkap</label>
                                    <input id="fullname" type="text" class="form-control" name="reg_fullname" tabindex="1"
                                           required autofocus>
                                    <div class="invalid-feedback">
                                        Harap isi dengan nama lengkap Anda!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="reg_email" tabindex="1"
                                           required autofocus>
                                    <div class="invalid-feedback">
                                        Harap isi dengan e-mail Anda!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="reg_password"
                                           tabindex="2" required>
                                    <div class="invalid-feedback">
                                        Harap isi dengan password Anda!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="confirmPassword" class="control-label">Konfirmasi Password</label>
                                    </div>
                                    <input id="confirmPassword" type="password" class="form-control" name="reg_password_confirm"
                                           tabindex="2" required>
                                    <div class="invalid-feedback">
                                        Harap isi dengan password Anda!
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">
                                        Daftar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Sudah punya akun? <a href="<?= BASEURL; ?>auth/login">Masuk Sekarang</a>
                    </div>
                    <div class="simple-footer">
                        <a href="<?= BASEURL; ?>"><i class="fa fa-home"></i> Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- General JS Scripts -->
<script src="<?= BASEURL; ?>assets/landing/js/core/jquery.min.js"></script>
<script src="<?= BASEURL; ?>assets/landing/js/core/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="<?= BASEURL; ?>assets/landing/js/plugins/moment.min.js"></script>
<script src="<?= BASEURL; ?>assets/dashboard/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?= BASEURL; ?>assets/dashboard/js/scripts.js"></script>
<script src="<?= BASEURL; ?>assets/dashboard/js/custom.js"></script>
<script src="<?= BASEURL ?>assets/dashboard/js/sweetalert2.all.min.js"></script>

<!-- Page Specific JS File -->
<?php SweetAlert::alert(); ?>
</body>
</html>
