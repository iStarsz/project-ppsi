@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-semibold mb-6">QR Code for this Object</h1>

    <div class="mb-6">
        <!-- Tombol Generate QR Code selalu tampil -->
        <a href="{{ route('admin.aoqr_objects.generate_qrcode', $aoqrObject->id) }}" class="inline-block bg-[#1b325f] text-white px-6 py-3 rounded-md transition-colors duration-300">
            Generate QR Code
        </a>
    </div>

    @if ($qrCodePath)
    <div class="mt-6">
        <!-- Menampilkan QR Code jika sudah dibuat -->
        <div class="mb-4">
            <strong class="text-lg">QR Code:</strong>
            <div class="mt-2">
                <img src="{{ asset($qrCodePath) }}" alt="QR Code" class="w-48 h-48 rounded-md shadow-md">
            </div>
        </div>

        <!-- Tombol Download QR Code -->
        <div class="mt-4">
            <a href="{{ asset($qrCodePath) }}" download class="inline-block bg-[#1b325f] text-white px-6 py-3 rounded-md transition-colors duration-300">
                Download QR Code
            </a>
        </div>
    </div>
    @endif

    <div class="mt-6">
        <a href="{{ route('admin.aoqr_objects.index') }}" class="inline-block bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-600 transition-colors duration-300">
            Back to List
        </a>
    </div>
</div>
@endsection