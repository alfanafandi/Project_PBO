<?php

class Department
{
    private $namaDepartemen;


    public function __construct($namaDepartemen)
    {
        $this->namaDepartemen = $namaDepartemen;
    }

    public function getDepartmentInfo()
    {
        return $this->namaDepartemen;
    }
}


class Role
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

        return $this->departemen->getDepartmentInfo();
    }
}
