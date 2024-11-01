<?php
require_once 'model/model_role.php';
require_once 'model/barang_model.php';
require_once 'model/user_model.php';
require_once 'model/transaksi_model.php';

session_start();

if (isset($_GET['modul'])) {
    $modul = $_GET['modul'];
} else {
    $modul = 'dashboard';
}

switch ($modul) {
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
        $obj_modelRole = new ModelRole();

        switch ($fitur) {
            case 'add':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $role_name = $_POST['role_name'];
                    $role_desc = $_POST['role_description'];
                    $role_status = $_POST['role_status'];

                    $obj_modelRole->addRole($role_name, $role_desc, $role_status);

                    header('Location: /index.php?modul=role');
                    exit;
                } else {
                    include 'views/role_add.php';
                }
                break;

            case 'edit':
                if (!isset($_GET['id']) || empty($_GET['id'])) {
                    die("ID peran tidak ditemukan.");
                }
                $id = $_GET['id'];
                $role = $obj_modelRole->getRoleById($id);

                if (!$role) {
                    die("Role tidak ditemukan.");
                }

                include 'views/role_update.php';
                break;

            case 'update':
                if (!isset($_GET['id'])) {
                    die("ID peran tidak ditemukan.");
                }

                $idPeran = $_GET['id'];
                $role = $obj_modelRole->getRoleById($idPeran);

                if (!$role) {
                    die("Peran tidak ditemukan.");
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $namaPeran = $_POST['role_name'];
                    $descPeran = $_POST['role_description'];
                    $statusPeran = $_POST['role_status'];

                    $obj_modelRole->updateRole($idPeran, $namaPeran, $descPeran, $statusPeran);

                    header('Location: index.php?modul=role');
                    exit;
                }
                break;

            case 'delete':
                if (!isset($_GET['id']) || empty($_GET['id'])) {
                    die("ID peran tidak ditemukan.");
                }
                $id = $_GET['id'];

                $cek = $obj_modelRole->getRoleById($id);
                if (!$cek) {
                    die('Role tidak ditemukan!');
                }

                $obj_modelRole->deleteRole($id);

                header('Location: /index.php?modul=role');
                exit;

            default:
                $roles = $obj_modelRole->getAllRoles();
                include 'views/role_list.php';
                break;
        }
        break;

    case 'barang':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $obj_modelBarang = new ModelBarang();

        switch ($fitur) {
            case 'add':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $barang_nama = $_POST['barang_nama'];
                    $barang_stok = $_POST['barang_stok'];
                    $barang_harga = $_POST['barang_harga'];

                    $obj_modelBarang->addBarang($barang_nama, $barang_stok, $barang_harga);

                    header('Location: index.php?modul=barang');
                    exit;
                }
                break;

            case 'update':
                if (!isset($_GET['id'])) {
                    die("ID barang tidak ditemukan");
                }
                $barang_id = $_GET['id'];
                $barang = $obj_modelBarang->getBarangById($barang_id);

                if (!$barang) {
                    die("Barang Tidak Dapat Ditemukan");
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $barang_nama = $_POST['barang_nama'];
                    $barang_stok = $_POST['barang_stok'];
                    $barang_harga = $_POST['barang_harga'];

                    $obj_modelBarang->updateBarang($barang_id, $barang_nama, $barang_stok, $barang_harga);

                    header('Location: index.php?modul=barang');
                    exit;
                }
                break;

            case 'edit':
                if (!isset($_GET['id']) || empty($_GET['id'])) {
                    die("ID barang tidak ditemukan");
                }
                $barang_id = $_GET['id'];
                $barang = $obj_modelBarang->getBarangById($barang_id);

                if (!$barang) {
                    die("Barang Tidak Dapat Ditemukan");
                }

                include 'views/barang_update.php';
                break;

            case 'delete':
                if (!isset($_GET['id']) || empty($_GET['id'])) {
                    die("ID barang tidak ditemukan");
                }
                $barang_id = $_GET['id'];
                $cek = $obj_modelBarang->getBarangById($barang_id);

                if (!$cek) {
                    die("ID barang tidak ditemukan");
                }

                $obj_modelBarang->deleteBarang($barang_id);

                header('Location: index.php?modul=barang');
                exit;

            default:
                $barangs = $obj_modelBarang->getAllBarangs();
                include 'views/barang_list.php';
                break;
        }
        break;

    case 'user':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $modelRole = new ModelRole();
        $obj_modelUser = new ModelUser($modelRole);
        switch ($fitur) {
            case 'add':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $user_nama = $_POST['user_nama'];
                    $user_username = $_POST['user_username'];
                    $user_password = $_POST['user_password'];
                    $user_role_id = $_POST['user_role_id'];
                    $obj_modelUser->addUser($user_nama, $user_username, $user_password, $user_role_id); // Tambahkan role_id ke addUser
                    header('Location: index.php?modul=user');
                    exit;
                } else {
                    include 'views/user_input.php';
                }
                break;
            case 'update':
                if (!isset($_GET['id'])) {
                    die("ID user tidak ditemukan");
                }
                $user_id = $_GET['id'];
                $user = $obj_modelUser->getUserById($user_id);
                if (!$user) {
                    die("User Tidak Dapat Ditemukan");
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $user_nama = $_POST['user_nama'];
                    $user_username = $_POST['user_username'];
                    $user_password = $_POST['user_password'];
                    $obj_modelUser->updateUser($user_id, $user_nama, $user_username, $user_password); // Update nama, username, dan password
                    header('Location: index.php?modul=user');
                    exit;
                }
                break;
            case 'edit':
                if (!isset($_GET['id']) || empty($_GET['id'])) {
                    die("ID user tidak ditemukan");
                }
                $user_id = $_GET['id'];
                $user = $obj_modelUser->getUserById($user_id);
                if (!$user) {
                    die("User Tidak Dapat Ditemukan");
                }
                include 'views/user_update.php';
                break;
            case 'delete':
                if (!isset($_GET['id']) || empty($_GET['id'])) {
                    die("ID user tidak ditemukan");
                }
                $user_id = $_GET['id'];
                $cek = $obj_modelUser->getUserById($user_id);
                if (!$cek) {
                    die("ID user tidak ditemukan");
                }
                $obj_modelUser->deleteUser($user_id);
                header('Location: index.php?modul=user');
                exit;
            default:
                $users = $obj_modelUser->getAllUser();
                include 'views/user_list.php';
                break;
        }
        break;
    case 'transaksi':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $modelRole = new ModelRole();
        $modelUser = new ModelUser($modelRole);
        $modelBarang = new ModelBarang();
        $modelTransaksi = new ModelTransaksi($modelUser, $modelRole, $modelBarang);

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

                        $modelTransaksi->addTransaksi($customer, $kasir, $total, $barangs, $jumlahs);
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

            case 'update':
                if (!isset($_GET['id'])) {
                    die("ID transaksi tidak ditemukan");
                }
                $transaksi_id = $_GET['id'];
                $transaksi = $modelTransaksi->getTransaksiById($transaksi_id);
                if (!$transaksi) {
                    die("Transaksi Tidak Dapat Ditemukan");
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $customer_id = $_POST['customer_id'];
                    $kasir_id = $_POST['kasir_id'];
                    $total = $_POST['total'];
                    $barang_ids = $_POST['barang_ids'];
                    $jumlahs = $_POST['jumlahs'];

                    $customer = $modelUser->getUserById($customer_id);
                    $kasir = $modelUser->getUserById($kasir_id);

                    $barangs = [];
                    foreach ($barang_ids as $barang_id) {
                        $barangs[] = $modelBarang->getBarangById($barang_id);
                    }

                    $modelTransaksi->updateTransaksi($transaksi_id, $customer, $kasir, $total, $barangs, $jumlahs);
                    header('Location: index.php?modul=transaksi');
                    exit;
                } else {
                    include 'views/transaksi_update.php';
                }
                break;

            case 'edit':
                if (!isset($_GET['id']) || empty($_GET['id'])) {
                    die("ID transaksi tidak ditemukan");
                }
                $transaksi_id = $_GET['id'];
                $transaksi = $modelTransaksi->getTransaksiById($transaksi_id);
                if (!$transaksi) {
                    die("Transaksi Tidak Dapat Ditemukan");
                }
                include 'views/transaksi_update.php';
                break;

            case 'delete':
                if (!isset($_GET['id']) || empty($_GET['id'])) {
                    die("ID transaksi tidak ditemukan");
                }
                $transaksi_id = $_GET['id'];
                $cek = $modelTransaksi->getTransaksiById($transaksi_id);
                if (!$cek) {
                    die("ID transaksi tidak ditemukan");
                }
                $modelTransaksi->deleteTransaksi($transaksi_id);
                header('Location: index.php?modul=transaksi');
                exit;

            default:
                $transaksis = $modelTransaksi->getAllTransaksi();
                include 'views/transaksi_list.php';
                break;
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
