<?php
//dependensi
require_once 'controller/controller_barang.php';
require_once 'controller/controller_user.php';
require_once 'controller/controller_transaksi.php';
require_once 'controller/controller_role.php';

session_start();


//objek sebagai parameter
$modelRole = new ModelRole();
$modelUser = new ModelUser($modelRole);
$modelBarang = new ModelBarang();
//objek role
$objectRole = new controllerRole();
//objek transaksi
$objectTransaksi = new controllerTransaksi($modelUser, $modelRole, $modelBarang);
//objek barang
$objectBarang = new controllerBarang();
//objek user
$objectUser = new controllerUser($modelRole);

if (!isset($_SESSION['user_id']) && (!isset($_GET['modul']) || $_GET['modul'] != 'login')) {
    header('Location: index.php?modul=login');
    exit;
}

if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
} else {
    $modul = 'dashboard';
}

switch ($modul) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['user_username'];
            $password = $_POST['user_password'];

            $modelRole = new ModelRole();
            $obj_modelUser = new ModelUser($modelRole);

            $user = $obj_modelUser->getUserByUsername($username);


            if ($user && password_verify($password, $user->user_password)) {
                $_SESSION['user_id'] = $user->user_id;
                $_SESSION['username'] = $user->user_username;
                $_SESSION['role'] = $user->role;

                header('Location: index.php?modul=dashboard');
                exit;
            } else {
                $error = "Username atau password salah!";
            }
        }
        include 'views/login.php';
        break;

    case 'dashboard':
        $obj_modelBarang = new ModelBarang();
        $barangs = $obj_modelBarang->getAllBarangs();
        $modelRole = new ModelRole();
        $obj_modelUser = new ModelUser($modelRole);
        $users = $obj_modelUser->getAllUser();
        $kasirs = $obj_modelUser->getUserByRole('Kasir');
        $modelRole = new ModelRole();
        $modelUser = new ModelUser($modelRole);
        $modelBarang = new ModelBarang();
        $obj_modelTransaksi = new ModelTransaksi($modelUser, $modelRole, $modelBarang);
        $transaksis = $obj_modelTransaksi->getAllTransaksi();
        include 'views/kosong.php';
        break;

    case 'role':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        switch ($fitur) {
            case 'add':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $role_name = $_POST['role_name'];
                    $role_desc = $_POST['role_description'];
                    $role_status = $_POST['role_status'];

                    $objectRole->addRole($role_name, $role_desc, $role_status);
                } else {
                    include 'views/role_input.php';
                }
                break;

            case 'edit':
                $objectRole->editById($id);
                break;

            case 'update':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $namaPeran = $_POST['role_name'];
                    $descPeran = $_POST['role_description'];
                    $statusPeran = $_POST['role_status'];

                    $objectRole->updateRole($id, $namaPeran, $descPeran, $statusPeran);
                }
                break;

            case 'delete':
                $objectRole->deleteRole($id);
                break;

            default:
                $objectRole->listRoles();
        }
        break;

    case 'barang':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        switch ($fitur) {
            case 'add':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $barang_nama = $_POST['barang_nama'];
                    $barang_stok = $_POST['barang_stok'];
                    $barang_harga = $_POST['barang_harga'];

                    $objectBarang->addBarang($barang_nama, $barang_stok, $barang_harga);
                } else {
                    include 'views/barang_input.php';
                }
                break;

            case 'update':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $barang_nama = $_POST['barang_nama'];
                    $barang_stok = $_POST['barang_stok'];
                    $barang_harga = $_POST['barang_harga'];

                    $objectBarang->updateBarang($id, $barang_nama, $barang_stok, $barang_harga);
                }
                break;

            case 'edit':
                $objectBarang->editById($id);
                break;

            case 'delete':
                $objectBarang->deleteBarang($id);
                break;

            default:
                $objectBarang->listBarangs();
        }
        break;

    case 'user':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        switch ($fitur) {
            case 'add':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $user_nama = $_POST['user_nama'];
                    $user_username = $_POST['user_username'];
                    $user_password = $_POST['user_password'];
                    $user_role_id = $_POST['user_role_id'];

                    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);

                    $objectUser->addUser($user_nama, $user_username, $hash_password, $user_role_id);
                } else {
                    include 'views/user_input.php';
                }
                break;
            case 'update':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $user_nama = $_POST['user_nama'];
                    $user_username = $_POST['user_username'];
                    $user_password = $_POST['user_password'];
                    $user_role_id = $_POST['user_role_id'];

                    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
                    $objectUser->updateUser($id, $user_nama, $user_username, $hash_password, $user_role_id);
                }
                break;
            case 'edit':
                $objectUser->editById($id);
                break;
            case 'delete':
                $objectUser->deleteUser($id);
                exit;
            default:
                $objectUser->listUser();
        }
        break;
    case 'transaksi':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        switch ($fitur) {
            case 'add':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['customer'], $_POST['kasir'], $_POST['barang'], $_POST['jumlah'])) {
                        $customer_id = $_POST['customer'];
                        $kasir_id = $_POST['kasir'];
                        $barang_ids = $_POST['barang'];
                        $jumlahs = $_POST['jumlah'];

                        $customer = $modelUser->getUserById($customer_id);
                        $kasir = $modelUser->getUserById($kasir_id);

                        $barangs = [];
                        foreach ($barang_ids as $barang_id) {
                            $barangs[] = $modelBarang->getBarangById($barang_id);
                        }

                        $total = 0;
                        foreach ($barangs as $key => $barang) {
                            $total += $barang->barang_harga * $jumlahs[$key];
                        }

                        $tgl_transaksi = date('d-m-Y');

                        $objectTransaksi->addTransaksi($tgl_transaksi, $customer, $kasir, $total, $barangs, $jumlahs);

                        header('Location: index.php?modul=transaksi');
                        exit;
                    } else {
                        die("Data tidak lengkap.");
                    }
                } else {
                    $customers = $modelUser->getUserByRole('Customer');
                    $kasirs = $modelUser->getUserByRole('Kasir');
                    $barangs = $modelBarang->getAllBarangs();

                    include 'views/transaksi_input.php';
                }
                break;
            default:
                $objectTransaksi->listTransaksi();
        }
        break;
    default:
        $obj_modelBarang = new ModelBarang();
        $barangs = $obj_modelBarang->getAllBarangs();
        $modelRole = new ModelRole();
        $obj_modelUser = new ModelUser($modelRole);
        $users = $obj_modelUser->getAllUser();
        $kasirs = $obj_modelUser->getUserByRole('Kasir');
        $modelRole = new ModelRole();
        $modelUser = new ModelUser($modelRole);
        $modelBarang = new ModelBarang();
        $obj_modelTransaksi = new ModelTransaksi($modelUser, $modelRole, $modelBarang);
        $transaksis = $obj_modelTransaksi->getAllTransaksi();
        include 'views/kosong.php';
        break;
}
