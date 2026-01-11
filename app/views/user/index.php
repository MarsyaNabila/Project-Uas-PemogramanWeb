<?php include '../app/views/layout/header.php'; ?>

<h2>🍔 Menu Makanan</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Nama</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php foreach ($produk as $p): ?>
<tr>
    <td><?= $p['nama'] ?></td>
    <td>Rp <?= number_format($p['harga']) ?></td>
    <td><?= $p['stok'] ?></td>
    <td>
        <?php if ($p['stok'] > 0): ?>
            <a href="/makanan_penjualan/user/beli/<?= $p['id'] ?>">
                Beli
            </a>
        <?php else: ?>
            Habis
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?php include '../app/views/layout/footer.php'; ?>
