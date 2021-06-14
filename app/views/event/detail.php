<?php
require_once "./app/views/templates/landing/header.php";
?>

<header class="page-header header-filter" data-parallax="true"
        style="background-image: url('<?= BASEURL; ?>assets/landing/img/bg-min.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="brand">
                    <h1>Detail Event</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="main main-raised">
    <section class="section px-5">
        <div class="row">
            <div class="col-lg-8 col-12">
                <h2 class="font-weight-bold"><?= $data['event']['name'] ?></h2>
                <p class="h4"><b>Lokasi: </b><?= $data['event']['location'] ?></p>
                <p class="h4"><b>Waktu Pelaksanaan: </b><?= $data['event']['start_date'] ?></p>
                <p class="h4"><b>Status: </b><?php
                    if ($data['event']['status'] == 1) {
                        echo "Akan Datang";
                    } elseif ($data['event']['status'] == 2) {
                        echo "Sedang Berlangsung";
                    } else {
                        echo "Selesai";
                    } ?>
                </p>
                <p class="h4"><b>Deskripsi: </b></p>
                <div class="p-2">
                    <?= $data['event']['description'] ?>
                </div>
            </div>
            <?php if ($data['event']['status'] == 1): ?>
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="font-weight-bold">Donasi Sekarang!</h3>
                        <form method="post" action="<?= BASEURL ?>event/payment">
                            <input type="hidden" name="event_id" value="<?= $data['event']['id'] ?>">
                            <div class="form-group">
                                <label for="plant_id">Tanaman yang Didonasikan</label>
                                <select class="form-control selectpicker" id="plant_id" name="plant_id" required>
                                    <option disabled>Pilih Tanaman...</option>
                                    <?php foreach ($data['plants'] as $plant): ?>
                                    <option value="<?= $plant['plant_id'] ?>"><?= $plant['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="plant_amount">Jumlah Tanaman</label>
                                <input type="number" class="form-control" min="1" id="plant_amount" name="plant_amount"
                                       value="1">
                            </div>
                            <?php if (AuthManager::isLoggedIn()):?>
                            <input type="submit" class="btn btn-lg btn-primary w-100" value="Buat Donasi">
                            <?php else: ?>
                            <p class="text-center text-danger">Silakan Login terlebih dahulu!</p>
                            <?php endif;?>
                        </form>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="font-weight-bold">Pengumpulan Donasi telah ditutup!</h3>
                        <p class="h4">Terima kasih atas partisipasinya!</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
require_once "./app/views/templates/landing/footer.php";
?>
