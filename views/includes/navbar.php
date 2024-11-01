<nav class="bg-gradient-to-r from-blue-800 to-indigo-900 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo atau Title -->
        <div class="text-white font-extrabold text-2xl tracking-widest hover:scale-105 transition duration-300">
            <a href="/index.php?modul=dashboard">
                Data Manager
            </a>
        </div>

        <!-- User Info dan Logout Button -->
        <div class="flex items-center space-x-6 text-gray-200">
            <!-- Username -->
            <div class="flex items-center space-x-2 hover:text-gray-300 transition duration-300">
                <span class="hover:underline">Username</span>
            </div>

            <!-- Role -->
            <div class="flex items-center space-x-2 hover:text-gray-300 transition duration-300">
                <span class="hover:underline">Role</span>
            </div>

            <!-- Logout Button -->
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow-lg transform hover:scale-110 transition duration-300">
                Logout
            </button>
        </div>
    </div>
</nav>