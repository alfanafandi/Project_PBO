<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8" text-gray-700 atau text-gray-900>
            <!-- Konten utama -->
            <div class="container mx-auto">
                <!-- Tombol untuk menambah peran baru -->
                <div class="mb-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white transform hover:scale-110 transition duration-300 font-bold py-2 px-4 rounded">
                        <a href="views/role_input.php">Tambah Peran Baru</a>
                    </button>
                </div>

                <!-- Tabel Daftar Peran -->
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-full bg-white grid-cols-1">
                        <thead class="bg-gradient-to-r from-blue-800 to-indigo-900 text-white">
                            <tr>
                                <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">ID Peran</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nama Peran</th>
                                <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Deskripsi Peran</th>
                                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Status Peran</th>
                                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <!-- Baris Data Dinamis -->
                            <?php foreach ($roles as $role) : ?>
                                <tr class="text-center">
                                    <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($role->idPeran); ?></td>
                                    <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($role->namaPeran); ?></td>
                                    <td class="w-1/3 py-3 px-4"><?php echo htmlspecialchars($role->descPeran); ?></td>
                                    <td class="w-1/6 py-3 px-4"><?php echo htmlspecialchars($role->statusPekerjaan); ?></td>
                                    <td class="w-1/6 py-3 px-4">
                                        <!-- Tombol Update -->
                                        <button class="bg-green-500 hover:bg-green-700 text-white transform hover:scale-110 transition duration-300 font-bold py-2 px-4 rounded mr-2">
                                            <a href="index.php?modul=role&fitur=edit&id=<?php echo $role->idPeran; ?>" class="block">Ubah</a>
                                        </button>
                                        <!-- Tombol Delete -->
                                        <button class="bg-red-500 hover:bg-red-700 text-white transform hover:scale-110 transition duration-300 font-bold py-2 px-4 rounded mr-2" onclick="return confirm('Apakah Anda yakin ingin menghapus peran ini?');">
                                            <a href="index.php?modul=role&fitur=delete&id=<?php echo $role->idPeran; ?>" class="block">Hapus</a>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>