<?php
require_once "./app/views/templates/dashboard/header.php";
require_once "./app/views/templates/dashboard/nav.php"; ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Semua Event</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Semua event</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Event</th>
                                    <th scope="col">Tanggal Pelaksanaan</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Perbarui Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Penghijauan Jember</td>
                                    <td>21 Oktober 2021</td>
                                    <td>Jember, Jawa Timur</td>
                                    <td>Akan datang</td>
                                    <td><a href="<?= BASEURL; ?>admin/update_event/1" class="btn btn-primary mr-1">Perbarui</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php
require_once "./app/views/templates/dashboard/footer.php"; ?>