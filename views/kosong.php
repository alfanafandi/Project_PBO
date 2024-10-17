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
        <div class="flex-1 p-8">
            <h1 class="text-2xl font-bold mb-6">Daftar Peran</h1>
            <?php
            foreach ($obj_role as $role) {
                echo "<div class='bg-white p-4 rounded shadow mb-4'>";
                echo "<p><strong>ID Role:</strong> " . htmlspecialchars($role->idPeran) . "</p>";
                echo "<p><strong>Nama Role:</strong> " . htmlspecialchars($role->namaPeran) . "</p>";
                echo "<p><strong>Keterangan:</strong> " . htmlspecialchars($role->descPeran) . "</p>";
                echo "<p><strong>Status Role:</strong> " . htmlspecialchars($role->statusPekerjaan) . "</p>";

                // Menampilkan informasi departemen
                if (isset($role->departemen)) {
                    echo "<p><strong>Departemen:</strong> " . htmlspecialchars($role->departemen->getDepartmentInfo()) . "</p>";
                }
                echo "</div>";
            }
            ?>
        </div>
    </div>

</body>

</html>