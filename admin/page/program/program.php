<div class="main-content">
    <!--main-->
    <main>
        <h2 class="dash-title">Program</h2>

        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Daftar Program</h3>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                            Tambah
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Program</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="page/program/tambah.php" method="post">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Program</label>
                                                <input type="text" name="nama_program" class="form-control" required>
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
                                <th>Nama Program</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $koneksi = mysqli_connect("localhost", "root", "", "monitor_bansos");
                            $data = mysqli_query($koneksi, "SELECT * FROM program_bantuan");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <td><?= $d['id'] ?></td>
                                    <td><?= $d['nama_program'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $d['id'] ?>">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="edit<?php echo $d['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Program</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="page/program/edit.php" method="post">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label class="form-label">Nama Program</label>
                                                                <input type="text" style="display: none;" value="<?= $d["id"] ?>" name="id">
                                                                <input type="text" name="nama_program" class="form-control" required value="<?= $d['nama_program'] ?>">
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
                                        <a class="btn btn-danger" href="page/program/hapus.php?id=<?php echo $d["id"] ?>" onclick="return confirm('Hapus?')">Hapus</a>
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