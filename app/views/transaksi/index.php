<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-4">
    <h3 class="mb-3">Data Transaksi</h3>

    <a href="/makanan_penjualan/transaksi/create" class="btn btn-primary mb-3">
        + Transaksi Baru
    </a>

    <table class="table table-bordered table-striped bg-white">
        <thead class="table-light">
            <tr>
                <th>User</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($transaksi && $transaksi->num_rows > 0): ?>
                <?php while ($row = $transaksi->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['username']) ?></td>
                        <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                        <td><?= $row['tanggal'] ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center text-muted">
                        Belum ada transaksi
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
