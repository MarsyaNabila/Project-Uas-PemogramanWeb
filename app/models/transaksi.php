<?php

require_once "../core/Database.php";

class Transaksi extends Database
{
    // =================================
    // AMBIL SEMUA TRANSAKSI
    // =================================
    public function getAll()
    {
        $sql = "SELECT transaksi.*, users.username 
                FROM transaksi
                JOIN users ON transaksi.user_id = users.id
                ORDER BY transaksi.id DESC";

        return $this->conn->query($sql);
    }

    // =================================
    // TAMBAH TRANSAKSI
    // =================================
    public function create($user_id, $total)
    {
        $tanggal = date('Y-m-d H:i:s');

        $sql = "INSERT INTO transaksi (user_id, total, tanggal)
                VALUES ('$user_id', '$total', '$tanggal')";

        return $this->conn->query($sql);
    }
}
