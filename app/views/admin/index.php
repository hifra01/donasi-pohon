<?php
require_once "./app/views/templates/dashboard/header.php";
require_once "./app/views/templates/dashboard/nav.php"; ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Beranda</h1>
        </div>
        <div class="row">
            <div class="col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-money-bill-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Donasi</h4>
                        </div>
                        <div class="card-body">
                            Rp69.666.666,00
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Event</h4>
                        </div>
                        <div class="card-body">
                            10
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Event Akan Datang</h4>
                        </div>
                        <div class="card-body">
                            5
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Event Berjalan</h4>
                        </div>
                        <div class="card-body">
                            2
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Event Selesai</h4>
                        </div>
                        <div class="card-body">
                            3
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
require_once "./app/views/templates/dashboard/footer.php"; ?>
