<?php

require_once 'model/barang_model.php';

class controllerBarang
{
    private $barangModel;

    public function __construct()
    {
        $this->barangModel = new modelBarang();
    }

    public function listBarangs()
    {
        $barangs = $this->barangModel->getAllBarangs();
        include 'views/barang_list.php';
    }


    public function addBarang($barang_nama, $barang_stok, $barang_harga)
    {
        $this->barangModel->addBarang($barang_nama, $barang_stok, $barang_harga);
        header('Location: /index.php?modul=barang');
    }

    public function editById($barang_id)
    {
        $barang = $this->barangModel->getBarangById($barang_id);
        include 'views/barang_update.php';
    }

    public function updateBarang($barang_id, $barang_nama, $barang_stok, $barang_harga)
    {
        $this->barangModel->updateBarang($barang_id, $barang_nama, $barang_stok, $barang_harga);
        header('Location: index.php?modul=barang');
    }

    public function deleteBarang($id)
    {
        $cek = $this->barangModel->deleteBarang($id);
        if ($cek == false) {
            throw new Exception('gak onok coy');
        } else {
            header('location: index.php?modul=barang');
        }
    }

    // public function getListRoleName()
    // {
    //     $listRoleName = [];
    //     foreach ($this->roleModel->getAllRoles() as $role) {
    //         $listRoleName[] = $role->namaPeran;
    //     }
    //     return $listRoleName;
    // }

    // public function getRoleByName($name)
    // {
    //     return $this->roleModel->getRoleByName($name);
    // }
}
