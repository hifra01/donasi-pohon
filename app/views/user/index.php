<?php
require_once "./app/views/templates/dashboard/header.php";
require_once "./app/views/templates/dashboard/nav_user.php"; ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halo, <?= AuthManager::getUserName() ?></h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Semua Donasi</h4>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-responsive-md">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Event</th>
                                <th scope="col">Tanaman</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Detail</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (empty($data['donations'])): ?>
                                <tr>
                                    <td colspan="7"><p class="text-center">Tidak ada data</p></td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($data['donations'] as $donation): ?>
                                    <tr>
                                        <td>#<?= sprintf("%06d", $donation['id']) ?></td>
                                        <td><?= $donation['event_name'] ?></td>
                                        <td><?= $donation['plant_name'] ?></td>
                                        <td><?= $donation['amount'] ?></td>
                                        <td>Rp<?= number_format($donation['total_price'], 2, ",", ".") ?></td>
                                        <?php if ($donation['status'] == 1): ?>
                                            <td>Menunggu Pembayaran</td>
                                        <?php elseif ($donation['status'] == 2): ?>
                                            <td>Memroses Transaksi</td>
                                        <?php elseif ($donation['status'] == 3): ?>
                                            <td>Transaksi Berhasil</td>
                                        <?php elseif ($donation['status'] == 4): ?>
                                            <td>Transaksi Dibatalkan</td>
                                        <?php else: ?>
                                            <td>Kode Status Tidak Diketahui</td>
                                        <?php endif; ?>
                                        <td><a href="<?= BASEURL; ?>user/donation/<?= $donation['id']; ?>"
                                               class="btn btn-primary">Detail</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once "./app/views/templates/dashboard/scripts.php"; ?>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
<?php require_once "./app/views/templates/dashboard/footer.php"; ?>
