<?php
require_once "./app/views/templates/dashboard/header.php";
require_once "./app/views/templates/dashboard/nav_admin.php";

$datetime = date_create($data['event']['start_date']);
$date = date_format($datetime, "Y-m-d");
$time = date_format($datetime, "H:i");
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Event</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" action="<?= BASEURL ?>admin/update_event/<?= $data['event']['id'] ?>">
                        <div class="card-header">
                            <h4>Update Event</h4>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="event_id" value="<?= $data['event']['id'] ?>">
                            <div class="form-group">
                                <label for="event_name">Nama Event</label>
                                <input type="text" class="form-control" id="event_name" name="event_name"
                                       value="<?= $data['event']['name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="event_location">Lokasi</label>
                                <input type="text" class="form-control" id="event_location" name="event_location"
                                       value="<?= $data['event']['location'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="event_date">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="event_date" name="event_date"
                                       value="<?= $date ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="event_time">Waktu Mulai</label>
                                <input type="time" class="form-control" id="event_time" name="event_time"
                                       value="<?= $time ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Tanaman yang dapat didonasikan</label>
                                <?php
                                foreach ($data['plants'] as $plant):
                                    ?>
                                    <?php if (in_array($plant['id'], $data['selected_plants'])) : ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="plant_<?= $plant['id'] ?>"
                                               name="event_plants[]" value="<?= $plant['id'] ?>" checked>
                                        <label class="form-check-label"
                                               for="plant_<?= $plant['id'] ?>"><?= $plant['name'] ?></label>
                                    </div>
                                <?php else: ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="plant_<?= $plant['id'] ?>"
                                               name="event_plants[]" value="<?= $plant['id'] ?>">
                                        <label class="form-check-label"
                                               for="plant_<?= $plant['id'] ?>"><?= $plant['name'] ?></label>
                                    </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group">
                                <label for="event_description">Deskripsi Event</label>
                                <textarea class="summernote-simple" id="event_description" name="event_description"
                                          required><?= $data['event']['description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="event_status">Status</label>
                                <select class="form-control" id="event_status" name="event_status">
                                    <option value="1" <?= ($data['event']['status']==1)?'selected="selected"':"" ?>>Akan Datang</option>
                                    <option value="2" <?= ($data['event']['status']==2)?'selected="selected"':"" ?>>Sedang Berlangsung</option>
                                    <option value="3" <?= ($data['event']['status']==3)?'selected="selected"':"" ?>>Selesai</option>
                                </select>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Update Event</button>
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
