@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Create Admin</h1>

    <!-- Form untuk menambah admin -->
    <form action="{{ route('admin.manage-admins.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#AAA577]" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="mt-2 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#AAA577]" required>
        </div>

        <div class="mb-4">
            <input type="checkbox" name="show_password" id="show_password" class="mr-2" />
            <label for="show_password" class="text-sm text-gray-700">Show Password</label>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-[#AAA577] text-white px-6 py-2 rounded-md mt-4 focus:outline-none focus:ring-2 focus:ring-[#AAA577]">Submit</button>
            <a href="{{ route('admin.manage-admins.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md mt-4 focus:outline-none focus:ring-2 focus:ring-gray-400">Cancel</a>
        </div>
    </form>
</div>

<script>
    // Toggle password visibility based on checkbox
    const showPasswordCheckbox = document.getElementById('show_password');
    const passwordField = document.getElementById('password');

    showPasswordCheckbox.addEventListener('change', function() {
        // Change the type of the password field based on checkbox status
        passwordField.type = this.checked ? 'text' : 'password';
    });
</script>
@endsection
