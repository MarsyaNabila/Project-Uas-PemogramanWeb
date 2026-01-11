<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="container">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h2 class="page-title">Daftar Produk</h2>
        <a href="/makanan_penjualan/produk/create" class="btn btn-add">+ Tambah</a>
    </div>

    <!-- SEARCH -->
    <form method="GET" style="margin-bottom:20px; display:flex; gap:10px;">
        <input 
            type="text" 
            name="q" 
            placeholder="Cari makanan..." 
            value="<?= htmlspecialchars($keyword ?? '') ?>"
            style="padding:10px; border-radius:10px; border:1px solid #f3c6d9; width:250px;"
        >
        <button class="btn btn-add">Cari</button>
    </form>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php if ($produk && $produk->num_rows > 0): ?>
                <?php $no = ($page - 1) * 5 + 1; ?>
                <?php while ($p = $produk->fetch_assoc()): ?>

                <tr>
                    <td><?= $no++ ?></td>

                    <!-- GAMBAR FIX -->
                    <td>
                        <?php if (!empty($p['gambar'])): ?>
                            <img 
                                src="/makanan_penjualan/public/images/produk/<?= htmlspecialchars($p['gambar']) ?>"
                                alt="<?= htmlspecialchars($p['nama']) ?>"
                                width="60"
                                height="60"
                                style="object-fit:cover; border-radius:12px;"
                            >
                        <?php else: ?>
                            <span style="color:#999;">No Image</span>
                        <?php endif; ?>
                    </td>

                    <td><?= htmlspecialchars($p['nama']) ?></td>
                    <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
                    <td><?= $p['stok'] ?></td>
                    <td>
                        <a 
                            href="/makanan_penjualan/produk/delete?id=<?= $p['id'] ?>" 
                            class="btn btn-delete"
                            onclick="return confirm('Hapus produk?')"
                        >
                            Hapus
                        </a>
                    </td>
                </tr>

                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align:center; padding:20px;">
                        Data tidak ditemukan
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    <?php if ($totalPage > 2): ?>
    <div style="margin-top:25px; text-align:center;">
        <?php for ($i = 2; $i <= $totalPage; $i++): ?>
            <a 
                href="?page=<?= $i ?>&q=<?= urlencode($keyword ?? '') ?>"
                style="
                    display:inline-block;
                    margin:0 5px;
                    padding:8px 14px;
                    border-radius:10px;
                    text-decoration:none;
                    background:<?= $i == $page ? '#ff5fa2' : '#ffe0ec' ?>;
                    color:<?= $i == $page ? 'white' : '#d63384' ?>;
                    font-weight:bold;
                "
            >
                <?= $i ?>
            </a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>

</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
