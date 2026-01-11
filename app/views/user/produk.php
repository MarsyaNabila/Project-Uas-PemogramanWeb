<?php include __DIR__ . '/../layout/header_user.php'; ?>

<div class="container">
    <h2>🍽️ Daftar Menu</h2>

    <table>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = $produk->fetch_assoc()): ?>
        <tr>
            <td><?= $row['nama'] ?></td>
            <td>Rp <?= number_format($row['harga'],0,',','.') ?></td>
            <td><?= $row['stok'] ?></td>
            <td>
                <a href="/makanan_penjualan/index.php?url=user/beli/<?= $row['id'] ?>">Beli</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <?php if ($total_halaman > 1): ?>
    <div class="pagination">

        <?php if ($halaman > 1): ?>
            <a href="/makanan_penjualan/index.php?url=user/produk&hal=<?= $halaman-1 ?>">«</a>
        <?php endif; ?>

        <?php for ($i=1; $i<=$total_halaman; $i++): ?>
            <a href="/makanan_penjualan/index.php?url=user/produk&hal=<?= $i ?>"
               class="<?= ($i==$halaman)?'active':'' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>

        <?php if ($halaman < $total_halaman): ?>
            <a href="/makanan_penjualan/index.php?url=user/produk&hal=<?= $halaman+1 ?>">»</a>
        <?php endif; ?>

    </div>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../layout/footer_user.php'; ?>
