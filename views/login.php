<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-gray-200 to-gray-400 flex items-center justify-center min-h-screen text-gray-800">
    <div class="flex w-full h-screen shadow-lg rounded-lg overflow-hidden bg-opacity-80 backdrop-filter backdrop-blur-lg">

        <!-- Left side: Welcome message -->
        <div class="hidden md:flex w-1/2 h-full items-center justify-center p-10 bg-gray-200 bg-opacity-90">
            <div class="space-y-4 text-left">
                <h2 class="text-4xl font-bold text-gray-800">Selamat Datang</h2>
                <p class="text-lg text-gray-700">Silakan masuk dengan akun Anda untuk melanjutkan.</p>
            </div>
        </div>

        <!-- Right side: Login form -->
        <div class="w-full md:w-1/2 h-full flex items-center justify-center p-8 bg-gray-100 bg-opacity-90">
            <div class="w-full max-w-sm p-8 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Login</h2>

                <form action="index.php?modul=login" method="POST" class="space-y-6">
                    <!-- Username Field -->
                    <div>
                        <label for="user_username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="user_username" name="user_username" required
                            class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800">
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="user_password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="user_password" name="user_password" required
                            class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800">
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md font-semibold hover:bg-blue-600">
                        Log In
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>