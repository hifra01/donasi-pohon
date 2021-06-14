<?php
require_once "./app/views/templates/dashboard/header.php";
require_once "./app/views/templates/dashboard/nav_admin.php"; ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Donasi</h1>
        </div>
        <div class="section-body">
            <div class="invoice px-lg-5">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2>Detail Donasi</h2>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>ID Donasi:</strong>
                                    <br>
                                    <p>#<?= sprintf("%06d", $data['donation']['id']) ?></p>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <strong>Status Donasi:</strong>
                                    <br>
                                    <?php if ($data['donation']['status'] == 1): ?>
                                        <p>Menunggu Pembayaran</p>
                                    <?php elseif ($data['donation']['status'] == 2): ?>
                                        <p>Diproses</p>
                                    <?php elseif ($data['donation']['status'] == 3): ?>
                                        <p>Selesai</p>
                                    <?php elseif ($data['donation']['status'] == 4): ?>
                                        <p>Dibatalkan</p>
                                    <?php else: ?>
                                        <p>Unknown</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Nama Event:</strong>
                                    <br>
                                    <p><?= $data['event']['name'] ?></p>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <strong>Tanggal Donasi:</strong>
                                    <br>
                                    <p><?= $data['donation']['created_at'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>ID Pembayaran:</strong>
                                    <br>
                                    <p>#<?= sprintf("%06d", $data['payment']['id']) ?></p>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <strong>Metode Pembayaran:</strong>
                                    <br>
                                    <span><?= $data['payment']['bank_name'] ?></span><br>
                                    <span><?= $data['payment']['bank_account'] ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Status Pembayaran:</strong>
                                    <br>
                                    <?php if($data['payment']['status'] == 1): ?>
                                    <p>Menunggu Verifikasi</p>
                                    <?php elseif($data['payment']['status'] == 2): ?>
                                    <p>Terverifikasi</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                Rincian Donasi
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <thead>
                                    <tr>
                                        <th>Tanaman</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?= $data['plant']['name'] ?></td>
                                        <td>Rp<?= number_format($data['donation']['price'], 2, ",", ".") ?></td>
                                        <td><?= $data['donation']['amount'] ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="section-title">
                                Perbarui Status
                            </div>
                            <form method="post" action="<?= BASEURL ?>admin/update_donation">
                                <input type="hidden" name="donation_id" value="<?= $data['donation']['id'] ?>">
                                <div class="form-group">
                                    <label for="donation_status">Perbarui Status:</label>
                                    <select class="form-control" id="donation_status" name="donation_status">
                                        <option value="1" disabled <?= ($data['donation']['status'] == 1)?'selected':'' ?>>Menunggu Pembayaran</option>
                                        <option value="2" disabled <?= ($data['donation']['status'] == 2)?'selected':'' ?>>Diproses</option>
                                        <option value="3" <?= ($data['donation']['status'] == 3)?'selected':'' ?>>Selesai</option>
                                        <option value="4" <?= ($data['donation']['status'] == 4)?'selected':'' ?>>Dibatalkan</option>
                                    </select>
                                    <small>Untuk mengubah status dari <b>Menunggu Pembayaran</b> menjadi <b>Diproses</b>, konfirmasi pembayaran terlebih dahulu.</small>
                                </div>
                                <div class="text-right">
                                    <input type="submit" value="Perbarui" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 text-right">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value">Rp<?= number_format($data['donation']['total_price'], 2, ",", ".") ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require_once "./app/views/templates/dashboard/scripts.php"; ?>
<?php require_once "./app/views/templates/dashboard/footer.php"; ?>
