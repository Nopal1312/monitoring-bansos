<div class="main-content">
    <!--main-->
    <main>
        <h2 class="dash-title">Wilayah</h2>

        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Daftar Wilayah</h3>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Wilayah</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="page/wilayah/tambah.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Provinsi</label>
                                            <input type="text" name="provinsi" class="form-control" required>
                                            <label class="form-label">Kabupaten</label>
                                            <input type="text" name="kabupaten" class="form-control" required>
                                            <label class="form-label">Kecamatan</label>
                                            <input type="text" name="kecamatan" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                                <th>Kecamatan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");
                            $data = mysqli_query($koneksi, "SELECT * FROM wilayah");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <td><?= $d['id'] ?></td>
                                    <td><?= $d['provinsi'] ?></td>
                                    <td><?= $d['kabupaten'] ?></td>
                                    <td><?= $d['kecamatan'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $d['id'] ?>">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="edit<?php echo $d['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Wilayah</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="page/wilayah/edit.php" method="post">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <input type="text" name="id" value="<?= $d['id'] ?>" style="display: none;">
                                                            <label class="form-label">Provinsi</label>
                                                            <input type="text" name="provinsi" class="form-control" value="<?= $d['provinsi'] ?>" required>
                                                            <label class="form-label">Kabupaten</label>
                                                            <input type="text" name="kabupaten" class="form-control" value="<?= $d['kabupaten'] ?>" required>
                                                            <label class="form-label">Kecamatan</label>
                                                            <input type="text" name="kecamatan" class="form-control" value="<?= $d['kecamatan'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-danger" href="page/wilayah/hapus.php?id=<?php echo $d["id"] ?>" onclick="return confirm('Hapus?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </section>
    </main>
</div>