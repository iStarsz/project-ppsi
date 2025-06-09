<!-- resources/views/public/object_not_found.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Object Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F7EFE8] min-h-screen flex flex-col items-center justify-center">
    <div class="text-center">
        <h1 class="text-3xl font-semibold mb-4">Object Not Found</h1>
        <p class="text-lg">{{ session('error') }}</p>
        <a href="{{ url('/') }}" class="mt-4 text-lg text-blue-500">Back to Home</a>
    </div>
</body>
</html>
