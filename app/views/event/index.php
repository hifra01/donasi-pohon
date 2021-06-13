<?php
require_once "./app/views/templates/landing/header.php";
?>

<header class="page-header header-filter" data-parallax="true"
        style="background-image: url('<?= BASEURL; ?>assets/landing/img/bg-min.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="brand">
                    <h1>Semua Event</h1>
                    <p class="h3">Pilih di mana pohonmu akan ditanam</p>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="main main-raised">
    <section class="section px-lg-5 px-2">

        <div class="row">
            <?php foreach ($data['events'] as $event): ?>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h2><?= $event['name'] ?></h2>
                    </div>
                    <div class="card-body">
                        <p class="h4"><b>Lokasi:</b> <?= $event['location'] ?></p>
                        <p class="h4"><b>Waktu Pelaksanaan:</b> <?= $event['start_date'] ?></p>
                        <p class="h4"><b>Status:</b> <?php
                            if($event['status'] == 1){
                                echo "Akan Datang";
                            } elseif ($event['status'] == 2) {
                                echo "Sedang Berlangsung";
                            } else {
                                echo "Selesai";
                            }
                            ?></p>
                        <a href="<?= BASEURL ?>event/detail/<?= $event['id'] ?>" class="btn btn-primary btn-lg w-100">Detail</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

    </section>
</main>
<?php
require_once "./app/views/templates/landing/footer.php";
?>
