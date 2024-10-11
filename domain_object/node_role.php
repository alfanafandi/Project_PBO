<?php
class Role
{
    public $idPeran;
    public $namaPeran;
    public $descPeran;
    public $statusPekerjaan;

    public function __construct($id, $nama, $desc, $status)
    {
        $this->idPeran = $id;
        $this->namaPeran = $nama;
        $this->descPeran = $desc;
        $this->statusPekerjaan = $status;
    }

    public function tampilkan()
    {
        echo "ID : " . $this->idPeran . "<br>";
        echo "Nama peran : " . $this->namaPeran . "<br>";
        echo "Deskripsi : " . $this->descPeran . "<br>";
        echo "Status : " . $this->statusPekerjaan . "<br>";
        echo "<br>";
    }
}
