<?php
require_once "./app/views/templates/landing/header.php";
?>
<header class="page-header header-filter" data-parallax="true"
        style="background-image: url('<?= BASEURL; ?>assets/landing/img/bg-min.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="brand">
                    <h1>Pembayaran</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="main main-raised">
    <section class="section">
        <div class="container w-50 px-lg-5">
            <h3 class="text-center font-weight-bold mb-5"> Detail Pembayaran </h3>
            <form method="post" action="<?= BASEURL ?>event/confirm_payment">
                <div class="row mb-3">
                    <div class="col-lg-6 col-12">
                        <p class="text-left font-weight-bold">
                            Nama Event:
                        </p>
                    </div>
                    <div class="col-lg-6 col-12">
                        <input type="hidden" name="event_id" value="<?= $data['event_id'] ?>">
                        <p class="text-lg-right text-left">
                            <a href="<?= BASEURL ?>event/detail/<?= $data['event_id'] ?>" target="_blank"><?= $data['event_name'] ?></a>
                        </p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6 col-12">
                        <p class="text-left font-weight-bold">
                            Tanaman yang Didonasikan:
                        </p>
                    </div>
                    <div class="col-lg-6 col-12">
                        <input type="hidden" name="plant_id" value="<?= $data['plant_id'] ?>">
                        <p class="text-lg-right text-left">
                            <?= $data['plant_name'] ?>
                        </p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6 col-12">
                        <p class="text-left font-weight-bold">
                            Harga Satuan:
                        </p>
                    </div>
                    <div class="col-lg-6 col-12">
                        <input type="hidden" name="plant_price" value="<?= $data['plant_price'] ?>">
                        <p class="text-lg-right text-left">
                            Rp<?= number_format($data['plant_price'],2,",",".") ?>
                        </p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6 col-12">
                        <p class="text-left font-weight-bold">
                            Jumlah Tanaman:
                        </p>
                    </div>
                    <div class="col-lg-6 col-12">
                        <input type="hidden" name="plant_amount" value="<?= $data['plant_amount'] ?>">
                        <p class="text-lg-right text-left">
                            <?= number_format($data['plant_amount']) ?>
                        </p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6 col-12 d-flex align-items-center">
                        <p class="text-left font-weight-bold m-0">
                            Harga Total:
                        </p>
                    </div>
                    <div class="col-lg-6 col-12">
                        <input type="hidden" name="total_price" value="<?= $data['total_price'] ?>">
                        <p class="h3 m-0 font-weight-bold text-lg-right text-left ">
                            Rp<?= number_format($data['total_price'],2,",",".") ?>
                        </p>
                    </div>
                </div>
                <div class="separator-line mb-3"></div>
                <div class="row mb-3 form-group">
                    <div class="col-lg-6 col-12 d-flex align-items-center">
                        <label for="bank_name" class="text-left font-weight-bold m-0 text-dark">
                            Nama Bank:
                        </label>
                    </div>
                    <div class="col-lg-6 col-12">
                        <input id="bank_name" name="bank_name" type="text" class="form-control" placeholder="Nama Bank Anda..." required>
                    </div>
                </div>
                <div class="row mb-3 form-group">
                    <div class="col-lg-6 col-12 d-flex align-items-center">
                        <label for="bank_account" class="text-left font-weight-bold m-0 text-dark">
                            Nomor Rekening:
                        </label>
                    </div>
                    <div class="col-lg-6 col-12">
                        <input id="bank_account" name="bank_account" type="text" class="form-control" placeholder="Nomor Rekening Anda..." pattern="[0-9]+"  required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12">
                        <input type="submit" value="Bayar" class="btn btn-lg btn-primary w-100">
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

<?php
require_once "./app/views/templates/landing/footer.php";
?>
