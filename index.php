<?php
require_once 'domain_object/node_role.php';


$obj_role = [];


$obj_role[] = new Role(1, "Guru", "Mengajar", "Aktif", new Department("Sekolah Dasar"));
$obj_role[] = new Role(2, "Mekanik", "Memperbaiki", "Aktif", new Department("Bengkel"));
$obj_role[] = new Role(3, "Dosen", "Mengajar", "Aktif", new Department("Fakultas Teknik"));


include 'views/role_list.php';
include 'views/kosong.php';
