<?php
require_once "./app/views/templates/dashboard/header.php";
require_once "./app/views/templates/dashboard/nav_admin.php"; ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Semua Pembayaran</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Semua Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-responsive-md">
                                <thead>
                                <tr>
                                    <th scope="col">ID Pembayaran</th>
                                    <th scope="col">ID Donasi</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (empty($data['payments'])): ?>
                                    <tr>
                                        <td colspan="7"><p class="text-center">Tidak ada data</p></td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($data['payments'] as $payment): ?>
                                        <tr>
                                            <td>#<?= sprintf("%06d", $payment['id']) ?></td>
                                            <td>#<?= sprintf("%06d", $payment['donation_id']) ?></td>
                                            <td>Rp<?= number_format($payment['amount'], 2, ",", ".") ?></td>
                                            <?php if ($payment['status'] == 1): ?>
                                                <td>Menunggu Verifikasi</td>
                                            <?php elseif ($payment['status'] == 2): ?>
                                                <td>Terverifikasi</td>
                                            <?php else: ?>
                                                <td>Kode Status Tidak Diketahui</td>
                                            <?php endif; ?>
                                            <td><a href="<?= BASEURL; ?>admin/payment/<?= $payment['id']; ?>"
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