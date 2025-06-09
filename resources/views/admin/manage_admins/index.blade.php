@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Manage Admin</h1>

    <!-- Tampilkan pesan success -->
    @if(session('success'))
    <div class="bg-green-100 bg-opacity-80 text-green-500 p-4 rounded-md mb-6">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tombol Create hanya untuk super admin -->
    @if ($isSuperAdmin)
    <a href="{{ route('admin.manage-admins.create') }}" class="bg-[#1b325f] text-white px-4 py-2 rounded-md mb-6 inline-block">Add Admin</a>
    @endif

    <!-- Daftar Admin -->
    <h2 class="text-2xl font-semibold mb-4">Admin List</h2>
    <table class="min-w-full table-auto bg-white border border-gray-200 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left">#</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2">
                    <div class="flex items-center">
                        <span class="mr-2">{{ $admin->email }}</span>
                        @if ($admin->isSuperAdmin)
                        <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-xs">Super Admin</span>
                        @else
                        <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded-full text-xs">Admin</span>
                        @endif
                    </div>
                </td>
                <td class="px-4 py-2 flex space-x-2">
                    <!-- Edit Admin -->
                    @if ($isSuperAdmin)
                    <a href="{{ route('admin.manage-admins.edit', $admin->id) }}" class="bg-gray-200 text-yellow-600 px-3 py-1 rounded-md">Edit</a>

                    <!-- Delete Admin hanya jika bukan super admin -->
                    @if (!$admin->isSuperAdmin)
                    <form action="{{ route('admin.manage-admins.destroy', $admin->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this admin?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-gray-200 text-red-500 px-3 py-1 rounded-md">Delete</button>
                    </form>
                    @endif
                    @else
                    <span class="text-gray-500">No actions available</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection