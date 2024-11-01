<?php

class Transaksi
{
    public $idTransaksi;
    public $customer;
    public $kasir;
    public $total;
    public $barangs;
    public $jumlahs;

    public function __construct($idTransaksi, $customer, $kasir, $total, $barangs, $jumlahs)
    {
        $this->idTransaksi = $idTransaksi;
        $this->customer = $customer;
        $this->kasir = $kasir;
        $this->total = $total;
        $this->barangs = $barangs;
        $this->jumlahs = $jumlahs;
    }
}
