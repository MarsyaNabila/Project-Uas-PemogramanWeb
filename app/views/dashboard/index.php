<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="container dashboard-wrapper">

    <div class="dashboard-title">
        🎀 Dashboard FoodApp 🎀
    </div>

    <div class="dashboard-cards">

        <div class="dashboard-card">
            <div class="dashboard-icon">🍔</div>
            <h3>Produk</h3>
            <p>Kelola data makanan</p>
            <a href="/makanan_penjualan/produk" class="dashboard-btn btn-produk">
                Kelola Produk
            </a>
        </div>

        <div class="dashboard-card">
            <div class="dashboard-icon">🛒</div>
            <h3>Transaksi</h3>
            <p>Lihat data transaksi</p>
            <a href="/makanan_penjualan/transaksi" class="dashboard-btn btn-transaksi">
                Lihat Transaksi
            </a>
        </div>

    </div>

</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
