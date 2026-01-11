<?php
// SESSION AMAN (tidak dobel)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>FoodApp | Sistem Penjualan Makanan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Project -->
    <link rel="stylesheet" href="/makanan_penjualan/public/css/style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/makanan_penjualan/dashboard">
            🍔 FoodApp
        </a>

        <div class="ms-auto">
            <a href="/makanan_penjualan/dashboard" class="btn btn-light btn-sm me-1">
                Dashboard
            </a>
            <a href="/makanan_penjualan/produk" class="btn btn-light btn-sm me-1">
                Produk
            </a>
            <a href="/makanan_penjualan/transaksi" class="btn btn-light btn-sm me-1">
                Transaksi
            </a>
            <a href="/makanan_penjualan/auth/logout" class="btn btn-danger btn-sm">
                Logout
            </a>
        </div>
    </div>
</nav>

<div class="container my-5">
