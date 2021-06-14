<?php
require_once "./app/views/templates/landing/header.php";
?>
    <header class="page-header header-filter" data-parallax="true"
            style="background-image: url('<?= BASEURL; ?>assets/landing/img/bg-min.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand">
                        <h1>Donasi Pohon</h1>
                        <p class="h3">Selamatkan masa depan anak cucu kita</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main main-raised">
        <!--    Apa yang terjadi-->
        <section class="section">
            <div class="container">
                <div class="text-center">
                    <h2>Apa yang Terjadi?</h2>
                    <p class="h4 mt-5">Luas hutan di Indonesia mengalami penurunan sebesar 0,5 hingga 1 juta hektar
                        setiap
                        tahun akibat alih fungsi hutan tanpa diikuti upaya pemeliharaan dan pelestarian berkelanjutan. (<a
                                href="https://mediaindonesia.com/nusantara/382711/luas-hutan-berkurang-1-juta-ha-setiap-tahun">Media
                            Indonesia</a>)</p>
                    <p class="h4 mt-5">Luas hutan yang semakin menurun dapat membuat keanekaragaman hayati flora dan
                        fauna hilang, begitu juga ekosistem penting yang memberikan udara dan air bersih, makanan, dan
                        obat-obatan.</p>
                    <p class="h4 mt-5">Donasi Pohon membantu Anda berkontribusi menyelamatkan hutan dan bumi. Hanya
                        dengan beberapa klik saja, Anda sudah ikut menanam pohon untuk memulihkan ekosistem yang
                        rusak.</p>
                </div>
            </div>
        </section>
        <!--    SDGs-->
        <section class="section">
            <div class="container">
                <div class="text-center">
                    <h2>Sustainable Development Goals</h2>
                    <div class="row w-50 mx-auto mt-5">
                        <div class="col-md-6 img-container">
                            <img src="<?= BASEURL ?>assets/landing/img/logo-sdgs-13.jpg" class="img">
                        </div>
                        <div class="col-md-6 img-container">
                            <img src="<?= BASEURL ?>assets/landing/img/logo-sdgs-15.jpg">
                        </div>
                    </div>
                    <p class="h4 mt-5">Donasi Pohon dibuat untuk mewujudkan dua tujuan dari 17 tujuan Pembangunan
                        Berkelanjutan (<i>Sustainable Development Goals</i>/SDGs), yaitu Penanganan Perubahan Iklim (<i>Climate
                            Action</i>) dan Ekosistem Daratan (<i>Life On Land</i>).</p>
                </div>
            </div>
        </section>

        <!--    Carousel-->
        <section class="section" id="carousel">
            <div class="container">
                <div class="text-center">
                    <h2>Cara Kerja</h2>
                </div>
                <div class="row">
                    <div class="col-md-8 mr-auto ml-auto">
                        <div class="card card-carousel">
                            <div id="carouselIndicators" class="carousel slide" data-ride="carousel"
                                 data-interval="3000">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselIndicators" data-slide-to="0"
                                        class="active"></li>
                                    <li data-target="#carouselIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselIndicators" data-slide-to="2"></li>
                                    <li data-target="#carouselIndicators" data-slide-to="3"></li>
                                    <li data-target="#carouselIndicators" data-slide-to="4"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100"
                                             src="<?= BASEURL; ?>assets/landing/img/carousel-bg.png" alt="First slide">
                                        <div class="carousel-caption">
                                            <p class="h3 text-center font-weight-bold">1. Pilih Lokasi yang Anda
                                                inginkan melalui Event</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100"
                                             src="<?= BASEURL; ?>assets/landing/img/carousel-bg.png" alt="Second slide">
                                        <div class="carousel-caption">
                                            <p class="h3 text-center font-weight-bold">2. Pilih jenis tanaman yang ingin Anda donasikan
                                                beserta jumlahnya</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100"
                                             src="<?= BASEURL; ?>assets/landing/img/carousel-bg.png" alt="Third slide">
                                        <div class="carousel-caption">
                                            <p class="h3 text-center font-weight-bold">3. Lakukan pembayaran</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100"
                                             src="<?= BASEURL; ?>assets/landing/img/carousel-bg.png" alt="Fourth slide">
                                        <div class="carousel-caption">
                                            <p class="h3 text-center font-weight-bold">4. Tim kami akan membelikan bibit tanaman sesuai
                                                dengan yang Anda pesan</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100"
                                             src="<?= BASEURL; ?>assets/landing/img/carousel-bg.png" alt="Fifth slide">
                                        <div class="carousel-caption">
                                            <p class="h3 text-center font-weight-bold">5. Pada hari event berlangsung, tanaman Anda akan
                                                ditanam bersama tanaman-tanaman lainnya untuk menghijaukan daerah
                                                tersebut.</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselIndicators" role="button"
                                   data-slide="prev">
                                    <i class="material-icons">keyboard_arrow_left</i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselIndicators" role="button"
                                   data-slide="next">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <!--                    End of carousel card-->
                    </div>
                </div>
            </div>
        </section>
        <!--    end of carousel-->
        <!--    donasi sekarang-->
        <section class="section">
            <div class="container">
                <div class="text-center">
                    <h2>Tunggu Apa Lagi?</h2>
                    <a href="<?= BASEURL ?>event" class="btn btn-primary btn-lg">Donasi Sekarang!</a>
                </div>
            </div>
        </section>
    </main>
<?php
require_once "./app/views/templates/landing/footer.php";
?>