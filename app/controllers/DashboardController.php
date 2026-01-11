<?php
require_once "../core/Auth.php";
require_once "../core/Controller.php";

class DashboardController extends Controller {
    public function index() {
        Auth::admin();
        $this->view("dashboard/index");
    }
}
