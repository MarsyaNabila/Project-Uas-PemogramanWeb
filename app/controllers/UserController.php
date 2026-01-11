<?php
require_once "../core/Auth.php";
require_once "../core/Controller.php";
require_once "../app/models/Produk.php";

class UserController extends Controller {

    public function index() {
        Auth::check();
        $this->view("user/dashboard");
    }

    public function produk() {
        Auth::check();

        $model = new Produk();

        // ================= PAGINATION FIX =================
        $limit = 2; // jumlah produk per halaman
        $halaman = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
        if ($halaman < 1) $halaman = 1;

        $offset = ($halaman - 1) * $limit;

        $produk = $model->searchPaginate('', $limit, $offset);
        $total_data = $model->countSearch('');
        $total_halaman = ceil($total_data / $limit);
        // ==================================================

        $this->view("user/produk", compact(
            'produk',
            'halaman',
            'total_halaman'
        ));
    }

    public function beli($id) {
        Auth::check();

        $produk = new Produk();
        $produk->kurangiStok($id, 1);

        header("Location: /makanan_penjualan/user/produk");
        exit;
    }
}
