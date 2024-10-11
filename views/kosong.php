<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Role</title>
    <!--    <link href="./Views/output.css" rel="stylesheet">-->
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
            <?php
            foreach ($obj_role as $role) {
                echo "id role : " . $role->idPeran . "<br>";
                echo "nama role : " . $role->namaPeran . "<br>";
                echo "keterangan : " . $role->descPeran . "<br>";
                echo "status role : " . $role->statusPekerjaan . "<br>";
                echo "<br>";
            }
            ?>
        </div>
    </div>

</body>

</html>