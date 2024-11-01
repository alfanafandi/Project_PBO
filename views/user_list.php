<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama User</title>
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
            <!-- Your main content goes here -->
            <div class="container mx-auto">
                <!-- Button to Insert New User -->
                <div class="mb-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <a href="views/user_input.php">Insert New User</a>
                    </button>
                </div>
                <!-- Users Table -->
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">User ID</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">User Name</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Username</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Role Name</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php if (!empty($users)) {
                                foreach ($users as $user) { ?>
                                    <tr class="text-center">
                                        <td class="py-3 px-4 text-blue-600">
                                            <?php echo htmlspecialchars($user->user_id); ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php echo htmlspecialchars($user->user_nama); ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php echo htmlspecialchars($user->user_username); ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <?php echo htmlspecialchars($user->role->namaPeran); ?>
                                        </td>
                                        <td class="py-3 px-4">
                                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                                <a href="index.php?modul=user&fitur=edit&id=<?php echo htmlspecialchars($user->user_id); ?>">
                                                    Update
                                                </a>
                                            </button>
                                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                <a href="index.php?modul=user&fitur=delete&id=<?php echo htmlspecialchars($user->user_id); ?>"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus user ini?');">
                                                    Delete
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="5" class="py-3 px-4 text-center">Tidak ada data pengguna tersedia.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>