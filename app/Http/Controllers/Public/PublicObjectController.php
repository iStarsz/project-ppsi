<?php

namespace App\Http\Controllers\Public;

use App\Models\AoqrObject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicObjectController extends Controller
{
    public function show($id)
    {
        // Cari objek berdasarkan ID dan pastikan aktif
        $object = AoqrObject::where('id', $id)->where('is_active', true)->first();

        // Jika objek tidak ditemukan, arahkan ke halaman lain dengan pemberitahuan
        if (!$object) {
            return redirect('/object-not-found')->with('error', 'Objek yang dicari tidak ada atau tidak aktif.');
        }

        // Tambahkan logika untuk meningkatkan view_count
        $object->increment('view_count');  // Menambah view_count sebanyak 1

        // Kirim data objek ke view
        return view('public.object_detail', compact('object'));
    }
}
