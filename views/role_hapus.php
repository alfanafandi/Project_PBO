<?php
// Simulasi data role untuk demonstrasi
$role_id = 1; // Ganti dengan ID role yang sesuai
$role_name = "Admin"; // Ganti dengan nama role yang sesuai
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Confirmation</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Modal background */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        /* Modal content */
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Tombol Hapus -->
    <button id="deleteBtn" class="bg-red-500 hover:bg-red-700 text-white transform hover:scale-110 transition duration-300 font-bold py-2 px-4 rounded mr-2">
        Hapus
    </button>

    <!-- Modal Konfirmasi -->
    <div id="myModal" class="modal flex">
        <div class="modal-content">
            <h2 class="text-xl font-bold mb-4">Apakah Anda yakin ingin menghapus?</h2>
            <p class="mb-6">Data yang dihapus tidak bisa dikembalikan.</p>
            <form id="deleteForm" action="role_delete.php" method="POST">
                <input type="hidden" name="role_id" value="<?php echo $role_id; ?>">
                <div>
                    <!-- Tombol Konfirmasi Hapus -->
                    <button type="submit" name="confirmDelete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Ya
                    </button>
                    <!-- Tombol Batal -->
                    <button type="button" id="cancelDelete" class="bg-gray-300 hover:bg-gray-500 text-black font-bold py-2 px-4 rounded">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Mengambil elemen modal dan tombol
        const modal = document.getElementById("myModal");
        const deleteBtn = document.getElementById("deleteBtn");
        const cancelDeleteBtn = document.getElementById("cancelDelete");

        // Menampilkan modal ketika tombol hapus ditekan
        deleteBtn.onclick = function() {
            modal.style.display = "flex";
        };

        // Menutup modal ketika tombol batal ditekan
        cancelDeleteBtn.onclick = function() {
            modal.style.display = "none";
        };

        // Menutup modal jika area di luar modal diklik
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };
    </script>

</body>

</html>