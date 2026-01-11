<?php

require_once "../core/Auth.php";
require_once "../core/Controller.php";
require_once "../app/models/Produk.php";

class ProdukController extends Controller
{
    // ==============================
    // LIST PRODUK + SEARCH + PAGINATION
    // ==============================
    public function index()
    {
        Auth::admin();

        $model = new Produk();

        // SEARCH
        $keyword = $_GET['q'] ?? '';

        // PAGINATION
        $limit = 5;
        $page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;

        $offset = ($page - 1) * $limit;

        // DATA
        $produk    = $model->searchPaginate($keyword, $limit, $offset);
        $totalData = $model->countSearch($keyword);
        $totalPage = ceil($totalData / $limit);

        // Kirim ke view
        $this->view("produk/index", compact(
            'produk',
            'keyword',
            'page',
            'totalPage'
        ));
    }

    // ==============================
    // TAMBAH PRODUK
    // ==============================
    public function create()
    {
        Auth::admin();

        if ($_POST) {
            (new Produk)->create(
                $_POST['nama'],
                $_POST['harga'],
                $_POST['stok']
            );

            header("Location: /makanan_penjualan/produk");
            exit;
        }

        $this->view("produk/create");
    }

    // ==============================
    // EDIT PRODUK
    // ==============================
    public function edit($id)
    {
        Auth::admin();

        $model = new Produk();

        if ($_POST) {
            $model->update(
                $id,
                $_POST['nama'],
                $_POST['harga'],
                $_POST['stok']
            );

            header("Location: /makanan_penjualan/produk");
            exit;
        }

        $produk = $model->find($id);
        $this->view("produk/edit", compact('produk'));
    }

    // ==============================
    // HAPUS PRODUK
    // ==============================
    public function delete($id)
    {
        Auth::admin();

        (new Produk)->delete($id);

        header("Location: /makanan_penjualan/produk");
        exit;
    }
}
