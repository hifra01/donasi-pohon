<?php
require_once "./app/views/templates/dashboard/header.php";
require_once "./app/views/templates/dashboard/nav.php"; ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Tanaman Baru</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" action="<?= BASEURL; ?>admin/add_plant">
                        <div class="card-header">
                            <h4>Tambah Tanaman Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="plant_name">Nama Tanaman</label>
                                <input type="text" class="form-control" id="plant_name" name="plant_name" required>
                            </div>
                            <div class="form-group">
                                <label for="plant_price">Harga</label>
                                <input type="number" class="form-control" id="plant_price" name="plant_price" min="0"
                                       step="1000" required>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Tambah Tanaman</button>
                                <button class="btn btn-secondary" type="reset">Reset Form</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
require_once "./app/views/templates/dashboard/footer.php"; ?>
