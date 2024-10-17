<?php
require_once 'domain_object/node_role.php';


$obj_role = [];


$obj_role[] = new Role(1, "Guru", "Mengajar", "Aktif", new Department("Sekolah Dasar", "Lantai 1"));
$obj_role[] = new Role(2, "Mekanik", "Memperbaiki", "Aktif", new Department("Bengkel", "Lantai 2"));
$obj_role[] = new Role(3, "Dosen", "Mengajar", "Aktif", new Department("Fakultas Teknik", "Lantai 3"));


include 'views/role_list.php';
include 'views/kosong.php';
