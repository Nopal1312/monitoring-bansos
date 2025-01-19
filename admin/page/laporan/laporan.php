<div class="main-content">
    <!--main-->
    <main>
        <h2 class="dash-title">Laporan</h2>

        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Daftar Laporan</h3>

                    <table>
                        <thead>
                            <tr>
                                <th>Nama Program</th>
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
                            $data = mysqli_query($koneksi, "SELECT * FROM laporan ORDER BY status DESC");
                            while ($d = mysqli_fetch_array($data)) {
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
                                            <a href="page/laporan/setuju.php?id=<?php echo $d['id'] ?>" class="btn btn-success" onclick="return confirm('Setujui Program ini?')">Setujui</a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Tolak
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Alasan Penolakan</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="page/laporan/tolak.php" method="post">
                                                            <div class="modal-body">
                                                                <div class="form-floating">
                                                                    <input type="text" style="display: none;" value="<?php echo $d["id"] ?>" name="id">
                                                                    <textarea class="form-control" placeholder="" id="floatingTextarea" required name="alasan_penolakan"></textarea>
                                                                    <label for="floatingTextarea">Alasan Penolakan</label>
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