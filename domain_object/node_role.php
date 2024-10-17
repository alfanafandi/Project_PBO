<?php

class Manusia
{
    private $nama;
    public function __construct($nama)
    {
        $this->nama = $nama;
    }
}

class Department
{
    private $namaDepartemen;
    private $lokasiDepartemen;

    public function __construct($namaDepartemen, $lokasiDepartemen)
    {
        $this->namaDepartemen = $namaDepartemen;
        $this->lokasiDepartemen = $lokasiDepartemen;
    }

    public function getDepartmentInfo()
    {
        return "Department: " . $this->namaDepartemen . " - Lokasi: " . $this->lokasiDepartemen;
    }
}


class Role extends Manusia
{
    public $idPeran;
    public $namaPeran;
    public $descPeran;
    public $statusPekerjaan;
    public $departemen;

    public function __construct($idPeran, $namaPeran, $descPeran, $statusPekerjaan, Department $departemen)
    {
        $this->idPeran = $idPeran;
        $this->namaPeran = $namaPeran;
        $this->descPeran = $descPeran;
        $this->statusPekerjaan = $statusPekerjaan;
        $this->departemen = $departemen;
    }

    public function tampilkanInfoPeran()
    {
        echo "Role ID : " . $this->idPeran . "<br>";
        echo "Role Name : " . $this->namaPeran . "<br>";
        echo "Role Description : " . $this->descPeran . "<br>";
        echo "Role Status : " . $this->statusPekerjaan . "<br>";
        echo $this->departemen->getDepartmentInfo() . "<br>";
        echo "<br>";
    }
}
