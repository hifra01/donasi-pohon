<?php
require_once "./app/views/templates/dashboard/header.php";
require_once "./app/views/templates/dashboard/nav.php"; ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Event Baru</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form>
                            <div class="card-header">
                                <h4>Tambah Event Baru</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="event_title">Nama Event</label>
                                    <input type="text" class="form-control" id="event_title" name="event_title">
                                </div>
                                <div class="form-group">
                                    <label for="event_location">Lokasi</label>
                                    <input type="text" class="form-control" id="event_location" name="event_location">
                                </div>
                                <div class="form-group">
                                    <label for="event_date">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="event_date" name="event_date">
                                </div>
                                <div class="form-group">
                                    <label for="event_time">Waktu Mulai</label>
                                    <input type="time" class="form-control" id="event_time" name="event_time">
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

<?php
require_once "./app/views/templates/dashboard/footer.php"; ?>