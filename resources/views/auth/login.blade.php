<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <img src="/assets/img/swararupalogo.png" alt="">
            <h2 class="text-2xl text-[#1b325F] font-semibold text-center mb-6 mt-6">Admin Login</h2>

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" class="mt-1 p-2 w-full border rounded-md shadow-sm @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" class="mt-1 p-2 w-full border rounded-md shadow-sm @error('password') border-red-500 @enderror" name="password" required>
                    @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-4">
                    <button type="submit" class="w-full bg-[#1b325f] text-white py-2 px-4 rounded-md focus:outline-none">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>