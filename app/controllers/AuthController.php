<?php
require_once "../core/Controller.php";
require_once "../app/models/User.php";

class AuthController extends Controller {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = (new User)->login(
                $_POST['username'],
                $_POST['password']
            );

            if ($user) {
                session_start();
                $_SESSION['user'] = $user;

                // ===============================
                // BEDAKAN DASHBOARD ADMIN & USER
                // ===============================
                if ($user['role'] == 'admin') {
                    header("Location: /makanan_penjualan/dashboard");
                } else {
                    header("Location: /makanan_penjualan/user");
                }
                exit;
            }
        }

        $this->view("auth/login");
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /makanan_penjualan/auth/login");
        exit;
    }
}
