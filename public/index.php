<?php
// =====================================
// FRONT CONTROLLER / ROUTING UTAMA
// =====================================

// Default URL
$url = $_GET['url'] ?? 'auth/login';
$url = rtrim($url, '/');
$exp = explode('/', $url);

$controller = $exp[0] ?? 'auth';
$method     = $exp[1] ?? 'index';
$param      = $exp[2] ?? null;

// =====================================
// ROUTING
// =====================================
switch ($controller) {

    // ================= AUTH =================
    case 'auth':
        require_once "../app/controllers/AuthController.php";
        $c = new AuthController();

        if ($method == 'login') {
            $c->login();
        } elseif ($method == 'logout') {
            $c->logout();
        }
        break;

    // ================= DASHBOARD =================
    case 'dashboard':
        require_once "../app/controllers/DashboardController.php";
        $c = new DashboardController();
        $c->index();
        break;

    // ================= PRODUK (ADMIN) =================
    case 'produk':
        require_once "../app/controllers/ProdukController.php";
        $c = new ProdukController();

        if ($method == 'create') {
            $c->create();
        } elseif ($method == 'edit') {
            $c->edit($param);
        } elseif ($method == 'delete') {
            $c->delete($param);
        } else {
            $c->index();
        }
        break;

    // ================= TRANSAKSI (ADMIN) =================
    case 'transaksi':
        require_once "../app/controllers/TransaksiController.php";
        $c = new TransaksiController();

        if ($method == 'create') {
            $c->create();
        } else {
            $c->index();
        }
        break;

    // ================= USER (BELI MAKANAN) =================
    case 'user':
        require_once "../app/controllers/UserController.php";
        $c = new UserController();

        if ($method == 'produk') {
            $c->produk();
        } elseif ($method == 'beli') {
            $c->beli($param);    
        } else {
            $c->index();
        }
        break;

    // ================= 404 =================
    default:
        http_response_code(404);
        echo "<h2>404 - Halaman tidak ditemukan</h2>";
        break;
}
