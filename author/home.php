    <!-- LIST ARTIKEL -->
    <div class="row g-4">

        <?php while($d = mysqli_fetch_assoc($data)){ ?>

        <div class="col-md-4">

            <div class="card card-artikel shadow-sm">

                <img src="../admin/upload/<?= $d['gambar']; ?>">

                <div class="card-body">

                    <h6><?= $d['judul']; ?></h6>

                    <p class="text-muted small">
                        <?= date('d M Y', strtotime($d['tanggal'])); ?>
                    </p>

                    <p>
                        <?= substr($d['isi'], 0, 60); ?>...
                    </p>

                    <a href="edit_artikel.php?id=<?= $d['id_artikel']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus_artikel.php?id=<?= $d['id_artikel']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>

                </div>

            </div>

        </div>

        <?php } ?>

    </div>

</div>

<!-- FOOTER -->
<footer class="text-center mt-5 mb-3 text-muted">
    <hr>
    <p>© <?= date('Y'); ?> Author Panel</p>
</footer>

</body>
</html>