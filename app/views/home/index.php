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
                    <p class="h3">Investasi untuk masa depan anak-anak kita</p>
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
                <p class="h4">Maraknya penebangan liar membuat luas hutan Indonesia berkurang sebanyak xx%.</p>
            </div>
        </div>
    </section>
    <!--    SDGs-->
    <section class="section">
        <div class="container">
            <div class="text-center">
                <h2>Sustainable Development Goals</h2>
                <p class="h4">Ekosistem darat dan perubahan iklim</p>
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
                        <div id="carouselIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselIndicators" data-slide-to="0" class="bg-dark border-dark active"></li>
                                <li data-target="#carouselIndicators" data-slide-to="1" class="bg-dark border-dark"></li>
                                <li data-target="#carouselIndicators" data-slide-to="2" class="bg-dark border-dark"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active p-5">
                                    <p class="h3 text-center">1. Isi Form Donasi</p>
                                </div>
                                <div class="carousel-item p-5">
                                    <p class="h3 text-center">2. Lorem Ipsum</p>
                                </div>
                                <div class="carousel-item p-5">
                                    <p class="h3 text-center">3. Dolor sit amet</p>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                                <i class="material-icons text-dark">keyboard_arrow_left</i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                                <i class="material-icons text-dark">keyboard_arrow_right</i>
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
                <a href="#" class="btn btn-primary btn-lg">Donasi Sekarang!</a>
            </div>
        </div>
    </section>
</main>
<?php
require_once "./app/views/templates/landing/footer.php";
?>