<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $data['judul']; ?></title>
    <!--    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">-->
    <!--    <link rel="icon" type="image/png" href="./assets/img/favicon.png">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?= BASEURL; ?>assets/landing/css/material-kit.css?v=2.0.7" rel="stylesheet"/>
</head>

<body class="index-page sidebar-collapse">
<nav class="navbar fixed-top navbar-expand-lg navbar-transparent navbar-color-on-scroll" color-on-scroll="100"
     id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html">
                Donasi Pohon </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <!--                <li class="dropdown nav-item">-->
                <!--                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">-->
                <!--                        <i class="material-icons">apps</i> Components-->
                <!--                    </a>-->
                <!--                    <div class="dropdown-menu dropdown-with-icons">-->
                <!--                        <a href="./index.html" class="dropdown-item">-->
                <!--                            <i class="material-icons">layers</i> All Components-->
                <!--                        </a>-->
                <!--                        <a href="https://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html" class="dropdown-item">-->
                <!--                            <i class="material-icons">content_paste</i> Documentation-->
                <!--                        </a>-->
                <!--                    </div>-->
                <!--                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL; ?>">
                        <i class="material-icons">home</i> Beranda
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">account_circle</i> Akun
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <a href="<?= BASEURL ?>auth/login" class="dropdown-item">
                            Login
                        </a>
                        <a href="<?= BASEURL ?>auth/register" class="dropdown-item">
                            Register
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>