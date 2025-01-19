<div class="main-content">
    <!--main-->
    <main>
        <h2 class="dash-title">Laporan</h2>

        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Daftar Laporan</h3>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Laporan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="page/laporan/tambah.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Program</label>
                                            <input type="text" name="nama_program" class="form-control" required>
                                            <label class="form-label">Jumlah Penerima</label>
                                            <input type="number" name="jumlah_penerima" class="form-control" required>
                                            <label class="form-label">Wilayah</label>
                                            <select class="form-control" name="wilayah">
                                                <option disabled selected>PILIH WILAYAH</option>
                                                <?php
                                                $koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");
                                                $data = mysqli_query($koneksi, "SELECT * FROM wilayah");
                                                while ($d = mysqli_fetch_array($data)) {
                                                ?>
                                                    <option value="<?= $d['provinsi'] ?>,<?= $d['kabupaten'] ?>,<?= $d['kecamatan'] ?>"><?= $d['provinsi'] ?>,<?= $d['kabupaten'] ?>,<?= $d['kecamatan'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label class="form-label">Tanggal Penyaluran</label>
                                            <input type="date" name="tgl_penyaluran" class="form-control" required>
                                            <label class="form-label">Bukti Penyaluran</label>
                                            <input type="file" name="bukti_penyaluran" class="form-control" required>
                                            <label class="form-label">Catatan Tambahan</label>
                                            <textarea name="catatan_tambahan" id="" class="form-control"></textarea>
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
                                <th>Nama Laporan</th>
                                <th>Wilayah</th>
                                <th>Jumlah Penerima</th>
                                <th>Tanggal Penyaluran</th>
                                <th>Bukti Penyaluran</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");
                            $data = mysqli_query($koneksi, "SELECT * FROM laporan ORDER BY status DESC ");
                            while ($d = mysqli_fetch_array($data)) {
                                $catatan = $d['catatan'];
                                $id = $d['id'];
                            ?>
                                <tr>
                                    <td><?= $d['nama_program'] ?></td>
                                    <td><?= $d['wilayah'] ?></td>
                                    <td><?= $d['jumlah_penerima'] ?></td>
                                    <td><?= $d['tgl_penyaluran'] ?></td>
                                    <td><?= $d['bukti_penyaluran'] ?></td>
                                    <td>
                                        <?php
                                        if ($d["status"] == 'disetujui') {
                                        ?>'<span class="badge text-bg-success"><?= $d['status'] ?></span>'
                                        <?php
                                        }
                                        if ($d["status"] == 'ditolak') {
                                        ?>'<span class="badge text-bg-danger"><?= $d['status'] ?></span>'
                                        <?php
                                        }
                                        if ($d["status"] == 'pending') {
                                        ?>'<span class="badge text-bg-warning"><?= $d['status'] ?></span>'
                                    <?php
                                        }
                                    ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($d['status'] == 'pending') {
                                        ?>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $d['id'] ?>">
                                                Edit
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="edit<?= $d['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="page/laporan/edit.php" method="post">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <input style="display: none;" type="text" name="id" value="<?= $d['id'] ?>">
                                                                    <label class="form-label">Nama Program</label>
                                                                    <input type="text" name="nama_program" class="form-control" required value="<?= $d['nama_program'] ?>">
                                                                    <label class="form-label">Jumlah Penerima</label>
                                                                    <input type="number" name="jumlah_penerima" class="form-control" required value="<?= $d['jumlah_penerima'] ?>">
                                                                    <label class="form-label">Wilayah</label>
                                                                    <select class="form-control" name="wilayah">
                                                                        <option><?= $d['wilayah'] ?></option>
                                                                        <?php
                                                                        $koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");
                                                                        $data = mysqli_query($koneksi, "SELECT * FROM wilayah");
                                                                        while ($d = mysqli_fetch_array($data)) {
                                                                        ?>
                                                                            <option value="<?= $d['provinsi'] ?>,<?= $d['kabupaten'] ?>,<?= $d['kecamatan'] ?>"><?= $d['provinsi'] ?>,<?= $d['kabupaten'] ?>,<?= $d['kecamatan'] ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <label class="form-label">Tanggal Penyaluran</label>
                                                                    <input type="date" name="tgl_penyaluran" class="form-control" required value="<?= $d['tgl_penyaluran'] ?>">
                                                                    <label class="form-label">Bukti Penyaluran</label>
                                                                    <input type="file" name="bukti_penyaluran" class="form-control" required value="<?= $d['bukti_penyaluran'] ?>">
                                                                    <label class="form-label">Catatan Tambahan</label>
                                                                    <textarea name="catatan_tambahan" id="" class="form-control"><?php echo $catatan ?></textarea>

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
                                            <a class="btn btn-danger" href="page/laporan/hapus.php?id=<?= $id ?>" onclick="return confirm('Hapus?')">Hapus</a>
                                        <?php
                                        } else {
                                        }
                                        ?>

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