<?php
require_once 'domain_object/node_role.php';

$obj_role = [];

$obj_role[] = new Role(1, "Guru", "mengajar", "aktif");
$obj_role[] = new Role(2, "Mekanik", "Memperbaiki", "aktif");
$obj_role[] = new Role(1, "Dosen", "mengajar", "aktif");

// foreach ($obj_role as $role) {
//     echo "id role : " . $role->idPeran . "<br>";
//     echo "nama role : " . $role->namaPeran . "<br>";
//     echo "keterangan : " . $role->descPeran . "<br>";
//     echo "status role : " . $role->statusPekerjaan . "<br>";
//     echo "<br>";
// }

include 'views/role_list.php';
