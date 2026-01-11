<?php include "../app/views/layout/header.php"; ?>

<h3>Tambah Makanan</h3>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="nama"
           class="form-control mb-2"
           placeholder="Nama Makanan" required>

    <input type="number" name="harga"
           class="form-control mb-2"
           placeholder="Harga" required>

    <input type="number" name="stok"
           class="form-control mb-2"
           placeholder="Stok" required>

    <input type="file" name="gambar"
           class="form-control mb-3" required>

    <button class="btn btn-danger">
        Simpan
    </button>
</form>

<?php include "../app/views/layout/footer.php"; ?>
