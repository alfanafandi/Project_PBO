<?php
session_start();

require_once 'model/model_role.php';

$obj_role = new modelRole();
$obj_role->addRole("Admin", "Untuk Admin", 0, new Department("admin", "lantai 2"));
$obj_role->addRole("Kasir", "Untuk Kasir", 1, new Department("Keuangan", "lantai 3"));
$obj_role->addRole("Customer", "Untuk Customer", 1, new Department("Layanan Pelanggan", "lantai 4"));

// testing 
foreach ($obj_role->getAllRoles() as $role) {
    echo "role ID : " . $role->idPeran . "<br>";
    echo "role Name : " . $role->namaPeran . "<br>";
    echo "role Description : " . $role->descPeran . "<br>";
    echo "role Status : " . $role->statusPekerjaan . "<br>";
    echo $role->tampilkanInfoPeran() . "<br>";
}

// // update role
// echo "==update data role==" . "<br>";
// $obj_role->updateRole(1, "update role", "role terupdate", 1);
// foreach ($obj_role->getAllRoles() as $role) {
//     echo "role ID : " . $role->idPeran . "<br>";
//     echo "role Name : " . $role->namaPeran . "<br>";
//     echo "role Description : " . $role->descPeran . "<br>";
//     echo "role Status : " . $role->statusPekerjaan . "<br>";
//     echo "role Departemen : " . $role->departemen . "<br><br>"; 
// }

// Menghapus data role
echo "==delete data role==" . "<br>";
$obj_role->deleteRole(1);
foreach ($obj_role->getAllRoles() as $role) {
    echo "role ID : " . $role->idPeran . "<br>";
    echo "role Name : " . $role->namaPeran . "<br>";
    echo "role Description : " . $role->descPeran . "<br>";
    echo "role Status : " . $role->statusPekerjaan . "<br>";
    echo $role->tampilkanInfoPeran() . "<br><br>";
}

session_destroy();
