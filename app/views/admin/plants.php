<?php
require_once "./app/views/templates/dashboard/header.php";
require_once "./app/views/templates/dashboard/nav_admin.php"; ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Semua Tanaman</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Semua Tanaman</h4>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-responsive-md">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Tanaman</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Update Harga</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (!empty($data['plants'])) {
                                    $i = 1;
                                    foreach ($data['plants'] as $plant) { ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $plant['name']; ?></td>
                                            <td>Rp<?= number_format($plant['price'],2,",","."); ?></td>
                                            <td><a href="<?= BASEURL; ?>admin/update_plant/<?= $plant['id']; ?>"
                                                   class="btn btn-primary">Perbarui</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php require_once "./app/views/templates/dashboard/scripts.php"; ?>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
<?php require_once "./app/views/templates/dashboard/footer.php"; ?>