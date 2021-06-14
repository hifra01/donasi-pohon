<?php
require_once "./app/views/templates/dashboard/header.php";
require_once "./app/views/templates/dashboard/nav_admin.php"; ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Event Baru</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form method="post" action="<?= BASEURL; ?>admin/add_event">
                            <div class="card-header">
                                <h4>Tambah Event Baru</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="event_name">Nama Event</label>
                                    <input type="text" class="form-control" id="event_name" name="event_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="event_location">Lokasi</label>
                                    <input type="text" class="form-control" id="event_location" name="event_location"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="event_date">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="event_date" name="event_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="event_time">Waktu Mulai</label>
                                    <input type="time" class="form-control" id="event_time" name="event_time" required>
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Tanaman yang dapat didonasikan</label>
                                    <?php
                                        foreach ($data['plants'] as $plant):
                                    ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="plant_<?= $plant['id']?>" name="event_plants[]" value="<?= $plant['id'] ?>">
                                        <label class="form-check-label" for="plant_<?= $plant['id'] ?>"><?= $plant['name'] ?></label>
                                    </div>
                                        <?php endforeach; ?>
                                </div>
                                <div class="form-group">
                                    <label for="event_description">Deskripsi Event</label>
                                    <textarea class="summernote-simple" id="event_description" name="event_description"
                                              required></textarea>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Tambah Event</button>
                                    <button class="btn btn-secondary" type="reset">Reset Form</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php require_once "./app/views/templates/dashboard/scripts.php"; ?>
<?php require_once "./app/views/templates/dashboard/footer.php"; ?>