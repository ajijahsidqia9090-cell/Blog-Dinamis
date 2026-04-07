<!-- CONTENT -->
<div class="container mt-4">

    <h3 class="mb-4 fw-bold">Dashboard</h3>

    <!-- STATISTIK -->
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card-modern bg-artikel shadow">
                <h6>Total Artikel</h6>
                <h2><?= $t['jumlah']; ?></h2>
                <i class="bi bi-file-text fs-1"></i>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-modern bg-kategori shadow">
                <h6>Total Kategori</h6>
                <h2><?= $t['jumlah']; ?></h2>
                <i class="bi bi-tags fs-1"></i>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-modern bg-user shadow">
                <h6>Total User</h6>
                <h2><?= $t['jumlah']; ?></h2>
                <i class="bi bi-people fs-1"></i>
            </div>
        </div>

    </div>

    <!-- INFO -->
    <div class="card-info mt-5 p-4 shadow">
        <h5>📌 Informasi</h5>
        <p>Dashboard ini digunakan untuk mengelola blog Anda.</p>
        <ul>
            <li>Kelola artikel</li>
            <li>Kelola kategori</li>
            <li>Kelola user</li>
        </ul>
    </div>

</div>