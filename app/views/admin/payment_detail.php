<?php
require_once "./app/views/templates/dashboard/header.php";
require_once "./app/views/templates/dashboard/nav_admin.php"; ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Konfirmasi Pembayaran</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="invoice">
                        <div class="invoice-print">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="invoice-title text-center">
                                        <h2>Detail Pembayaran</h2>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>ID Pembayaran:</b>
                                        </div>
                                        <div class="col-md-8 text-md-right">
                                            <p>#<?= sprintf("%06d", $data['payment']['id']) ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>ID Donasi:</b>
                                        </div>
                                        <div class="col-md-8 text-md-right">
                                            <a href="<?= BASEURL ?>admin/donation/<?= $data['payment']['donation_id'] ?>">
                                                <p>#<?= sprintf("%06d", $data['payment']['donation_id']) ?></p></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Nama Bank:</b>
                                        </div>
                                        <div class="col-md-8 text-md-right">
                                            <p><?= $data['payment']['bank_name'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Nomor Rekening:</b>
                                        </div>
                                        <div class="col-md-8 text-md-right">
                                            <p><?= $data['payment']['bank_account'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Total Pembayaran:</b>
                                        </div>
                                        <div class="col-md-8 text-md-right">
                                            <p class="h5 font-weight-bold">
                                                Rp<?= number_format($data['payment']['amount'], 2, ',', '.') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <?php if ($data['payment']['status'] == 1): ?>
                                    <form method="post" action="<?= BASEURL ?>admin/confirm_payment"
                                          id="confirm-payment">
                                        <input type="hidden" name="payment_id" value="<?= $data['payment']['id'] ?>">
                                        <input type="hidden" name="donation_id"
                                               value="<?= $data['payment']['donation_id'] ?>">
                                        <input type="submit" value="Verifikasi Pembayaran"
                                               class="btn btn-success w-100" id="btn-submit-confirm">
                                    </form>
                                <?php elseif ($data['payment']['status'] == 2): ?>
                                    <p class="text-center text-success">Pembayaran telah diverifikasi</p>
                                <?php else: ?>
                                    <p>Error!</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
</div>

<?php require_once "./app/views/templates/dashboard/scripts.php"; ?>
<?php require_once "./app/views/templates/dashboard/footer.php"; ?>
