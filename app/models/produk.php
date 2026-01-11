<?php

require_once "../core/Database.php";

class Produk extends Database
{
    // =================================
    // SEARCH + PAGINATION (ADMIN)
    // =================================
    public function searchPaginate($keyword = '', $limit = 5, $offset = 0)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM produk 
             WHERE nama LIKE ?
             ORDER BY id DESC
             LIMIT ?, ?"
        );

        $like = "%$keyword%";
        $stmt->bind_param("sii", $like, $offset, $limit);
        $stmt->execute();

        return $stmt->get_result();
    }

    // =================================
    // HITUNG DATA (PAGINATION)
    // =================================
    public function countSearch($keyword = '')
    {
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*) AS total FROM produk WHERE nama LIKE ?"
        );

        $like = "%$keyword%";
        $stmt->bind_param("s", $like);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_assoc();
        return $result['total'];
    }

    // =================================
    // AMBIL SEMUA PRODUK (USER)
    // =================================
    public function getAll()
    {
        return $this->conn->query(
            "SELECT * FROM produk ORDER BY id DESC"
        );
    }

    // =================================
    // TAMBAH PRODUK
    // =================================
    public function create($nama, $harga, $stok, $gambar = null)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO produk (nama, harga, stok, gambar)
             VALUES (?, ?, ?, ?)"
        );

        $stmt->bind_param("siis", $nama, $harga, $stok, $gambar);
        return $stmt->execute();
    }

    // =================================
    // AMBIL 1 DATA PRODUK (WAJIB ADA)
    // =================================
    public function find($id)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM produk WHERE id = ?"
        );

        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // =================================
    // UPDATE PRODUK
    // =================================
    public function update($id, $nama, $harga, $stok, $gambar = null)
    {
        if ($gambar) {
            $stmt = $this->conn->prepare(
                "UPDATE produk 
                 SET nama=?, harga=?, stok=?, gambar=? 
                 WHERE id=?"
            );
            $stmt->bind_param("siisi", $nama, $harga, $stok, $gambar, $id);
        } else {
            $stmt = $this->conn->prepare(
                "UPDATE produk 
                 SET nama=?, harga=?, stok=? 
                 WHERE id=?"
            );
            $stmt->bind_param("siii", $nama, $harga, $stok, $id);
        }

        return $stmt->execute();
    }

    // =================================
    // KURANGI STOK (USER BELI)
    // =================================
    public function kurangiStok($id, $qty)
    {
        $stmt = $this->conn->prepare(
            "UPDATE produk 
             SET stok = stok - ? 
             WHERE id = ? AND stok >= ?"
        );

        $stmt->bind_param("iii", $qty, $id, $qty);
        return $stmt->execute();
    }

    // =================================
    // HAPUS PRODUK
    // =================================
    public function delete($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM produk WHERE id = ?"
        );

        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
