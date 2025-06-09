<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="flex">
        <div class="bg-[#1b325f] text-white w-54 p-6 sticky top-0 h-screen">
            <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
            <ul>
                <li class="mb-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-lg p-1 rounded hover:bg-gray-100 hover:bg-opacity-20 w-full block">Dashboard</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('admin.categories.index') }}" class="text-lg p-1 rounded hover:bg-gray-100 hover:bg-opacity-20 w-full block">Categories</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('admin.aoqr_objects.index') }}" class="text-lg p-1 rounded hover:bg-gray-100 hover:bg-opacity-20 w-full block">Objects</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('admin.manage-admins.index') }}" class="text-lg p-1 rounded hover:bg-gray-100 hover:bg-opacity-20 w-full block">Admins</a>
                </li>
                <li class="mb-4">
                    <form action="{{ route('admin.logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="text-lg text-[#1b325f] p-1 bg-gray-100 rounded w-full">Logout</button>
                    </form>
                </li>
            </ul>
        </div>


        <!-- Main content -->
        <div class="flex-1 p-8 overflow-auto">
            @yield('content')
        </div>
    </div>

</body>

</html>