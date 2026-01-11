<?php

require_once "../core/Auth.php";
require_once "../core/Controller.php";
require_once "../app/models/Transaksi.php";

class TransaksiController extends Controller
{
    public function index()
    {
        Auth::check(); 

        $model = new Transaksi();
        $transaksi = $model->getAll();

        $this->view("transaksi/index", compact('transaksi'));
    }
}
