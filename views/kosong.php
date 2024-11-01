<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        <div class="flex-1 p-8">
            <!-- Dashboard Header -->
            <h2 class="text-2xl font-bold mb-4">Dashboard</h2>

            <!-- Statistik Utama -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Transaksi -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-800">Total Transaksi</h3>
                    <p class="text-3xl font-bold text-green-500">
                        <?php echo count($transaksis); ?>
                    </p>
                </div>

                <!-- Total Pengguna -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-800">Total Pengguna</h3>
                    <p class="text-3xl font-bold text-blue-500">
                        <?php echo count($users); ?>
                    </p>
                </div>

                <!-- Total Barang -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-800">Total Barang</h3>
                    <p class="text-3xl font-bold text-yellow-500">
                        <?php echo count($barangs); ?>
                    </p>
                </div>

                <!-- Total Kasir -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-800">Total Kasir</h3>
                    <p class="text-3xl font-bold text-purple-500">
                        <?php echo count($kasirs); ?>
                    </p>
                </div>
            </div>

            <!-- Tabel Ringkasan Transaksi -->
            <h3 class="text-xl font-semibold mb-4">Ringkasan Transaksi Terbaru</h3>
            <div class="bg-white rounded-lg shadow-lg overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="w-full bg-gray-200 text-gray-800 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID Transaksi</th>
                            <th class="py-3 px-6 text-left">Nama Customer</th>
                            <th class="py-3 px-6 text-left">Kasir</th>
                            <th class="py-3 px-6 text-left">Total</th>
                            <th class="py-3 px-6 text-left">Jumlah Barang</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php foreach ($transaksis as $transaksi) : ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left"><?php echo $transaksi->idTransaksi; ?></td>
                                <td class="py-3 px-6 text-left"><?php echo $transaksi->customer->user_nama; ?></td>
                                <td class="py-3 px-6 text-left"><?php echo $transaksi->kasir->user_nama; ?></td>
                                <td class="py-3 px-6 text-left">Rp<?php echo number_format($transaksi->total, 0, ',', '.'); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo count($transaksi->barangs); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>