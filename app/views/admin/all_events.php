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
                            <table class="table table-responsive-md">
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
                                <?php if (!empty($data['events'])): ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data['events'] as $event): ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td><?= $event['name'] ?></td>
                                            <td><?= $event['start_date'] ?></td>
                                            <td><?= $event['location'] ?></td>
                                            <?php if ($event['status'] == 1): ?>
                                                <td>Akan Datang</td>
                                            <?php elseif ($event['status'] == 2): ?>
                                                <td>Sedang Berlangsung</td>
                                            <?php elseif ($event['status'] == 3): ?>
                                                <td>Selesai</td>
                                            <?php endif; ?>
                                            <td><a href="<?= BASEURL; ?>admin/update_event/<?= $event['id'] ?>"
                                                   class="btn btn-primary mr-1">Perbarui</a></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6"><p class="text-center">Belum ada data</p></td>
                                    </tr>
                                <?php endif; ?>
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