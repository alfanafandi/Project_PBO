<?php
require_once 'model/transaksi_model.php';
class controllerTransaksi
{
    private $transaksiModel;
    private $modelUser;
    private $modelRole;
    private $modelBarang;

    public function __construct($modelUser, $modelRole, $modelBarang)
    {
        $this->modelUser = $modelUser;
        $this->modelRole = $modelRole;
        $this->modelBarang = $modelBarang;

        $this->transaksiModel = new ModelTransaksi($modelUser, $modelRole, $modelBarang);
    }

    public function listTransaksi()
    {
        $transaksis = $this->transaksiModel->getAllTransaksi();
        include 'views/transaksi_list.php';
    }

    public function addTransaksi($tgl_transaksi, $customer, $kasir, $total, $barangs, $jumlahs)
    {
        //konversi nama barang to objek barang
        $this->transaksiModel->addTransaksi($tgl_transaksi, $customer, $kasir, $total, $barangs, $jumlahs);
        header('location: index.php?modul=transaksi');
    }
}
