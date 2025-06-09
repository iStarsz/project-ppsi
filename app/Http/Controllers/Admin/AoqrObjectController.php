<?php

namespace App\Http\Controllers\Admin;

use App\Models\AoqrObject;
use App\Models\Category;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class AoqrObjectController extends Controller
{
    // Fungsi untuk menampilkan semua AoqrObject
    public function index()
    {
        $aoqrObjects = AoqrObject::all();
        $aoqrObjects = AoqrObject::with('category')->orderBy('created_at', 'desc')->get();
        $categories = Category::whereHas('objects')->pluck('name');
        return view('admin.aoqr_objects.index', compact('aoqrObjects', 'categories'));
    }

    // Fungsi untuk menampilkan AoqrObject berdasarkan ID
    public function show($id)
    {
        $aoqrObject = AoqrObject::find($id);

        if (!$aoqrObject) {
            return redirect()->route('admin.aoqr_objects.index')->with('error', 'AoqrObject not found');
        }

        return view('admin.aoqr_objects.view', compact('aoqrObject'));
    }

    // Fungsi untuk menampilkan form create AoqrObject
    public function create()
    {
        $categories = Category::all();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.aoqr_objects.create', compact('categories'));
    }

    


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name_object' => 'required|string|max:100',
            'location_object' => 'required|string|max:100',
            'description_object' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'is_active' => 'nullable|boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Menyimpan gambar yang diupload
        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Menyimpan gambar langsung di folder public/images/aoqr_objects
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/aoqr_objects'), $filename);
                // Menyimpan URL gambar ke dalam array
                $uploadedImages[] = asset('images/aoqr_objects/' . $filename);
            }
        }

        // Data yang akan disimpan ke database
        $data = $request->except('images'); // Mengambil data selain gambar
        $data['id'] = Str::uuid(); // Menambahkan UUID secara manual
        $data['image_url'] = json_encode($uploadedImages); // Menyimpan URL gambar dalam bentuk JSON

        // Menyimpan AoqrObject ke database
        AoqrObject::create($data);

        // Redirect setelah berhasil
        return redirect()->route('admin.aoqr_objects.index')->with('success', 'Aoqr Object created successfully');
    }

    


    // Fungsi untuk menampilkan form edit AoqrObject
    public function edit($id)
    {
        $aoqrObject = AoqrObject::find($id);
        $categories = Category::all();
        $categories = Category::orderBy('name', 'asc')->get();

        if (!$aoqrObject) {
            return redirect()->route('admin.aoqr_objects.index')->with('error', 'AoqrObject not found');
        }

        return view('admin.aoqr_objects.edit', compact('aoqrObject', 'categories'));
    }

    // Fungsi untuk mengupdate AoqrObject
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name_object' => 'required|string|max:100',
            'location_object' => 'required|string|max:100',
            'description_object' => 'required|string',
            'is_active' => 'nullable|boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar baru
        ]);

        // Mencari AoqrObject berdasarkan ID
        $aoqrObject = AoqrObject::find($id);

        if (!$aoqrObject) {
            return redirect()->route('admin.aoqr_objects.index')->with('error', 'AoqrObject not found');
        }

        // Ambil gambar lama
        $oldImages = json_decode($aoqrObject->image_url, true);
        $uploadedImages = [];

        if ($request->hasFile('images')) {
            // Hapus gambar lama dari direktori
            foreach ($oldImages as $oldImageUrl) {
                // Ambil path dari URL gambar
                $oldImagePath = public_path(str_replace(asset('images/aoqr_objects/'), 'images/aoqr_objects/', $oldImageUrl));
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Hapus gambar lama dari direktori
                }
            }

            // Menyimpan gambar baru
            foreach ($request->file('images') as $image) {
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/aoqr_objects'), $filename);
                // Menambahkan gambar baru ke array gambar
                $uploadedImages[] = asset('images/aoqr_objects/' . $filename);
            }
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $uploadedImages = $oldImages;
        }

        // Menyiapkan data untuk update
        $data = $request->except('images'); // Ambil data selain gambar
        $data['image_url'] = json_encode($uploadedImages); // Update URL gambar dengan gambar baru

        // Mengupdate AoqrObject
        $aoqrObject->update($data);

        return redirect()->route('admin.aoqr_objects.index')->with('success', 'AoqrObject updated successfully');
    }




   // Fungsi untuk menghapus AoqrObject
    public function destroy($id)
    {
        $aoqrObject = AoqrObject::find($id);

        if (!$aoqrObject) {
            return redirect()->route('admin.aoqr_objects.index')->with('error', 'AoqrObject not found');
        }

        // Mengambil gambar-gambar yang terkait dengan AoqrObject
        $images = json_decode($aoqrObject->image_url, true);
        
        // Loop untuk menghapus gambar-gambar yang terkait
        foreach ($images as $imageUrl) {
            // Mendapatkan path gambar dari URL (tanpa 'asset()')
            $imagePath = public_path(str_replace(asset('images/aoqr_objects/'), 'images/aoqr_objects/', $imageUrl));

            // Cek apakah file gambar ada dan hapus
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Menghapus AoqrObject
        $aoqrObject->delete();

        return redirect()->route('admin.aoqr_objects.index')->with('success', 'AoqrObject deleted successfully');
    }



    // Fungsi untuk menampilkan halaman QR Code
    public function viewQrCode($id)
    {
        $aoqrObject = AoqrObject::find($id);

        if (!$aoqrObject) {
            return redirect()->route('admin.aoqr_objects.index')->with('error', 'AoqrObject not found');
        }

        // Cek jika QR Code sudah dibuat
        $qrCodePath = $aoqrObject->qr_image_url ?? null;

        return view('admin.aoqr_objects.qrcode', compact('aoqrObject', 'qrCodePath'));
    }

    // Fungsi untuk generate QR Code
    public function generateQrCode($id)
    {
        $aoqrObject = AoqrObject::find($id);

        if (!$aoqrObject) {
            return redirect()->route('admin.aoqr_objects.index')->with('error', 'AoqrObject not found');
        }

        // Mendeklarasikan base URL
        $baseUrl = config('app.url');  // Mengambil base URL dari file .env

        // Menggabungkan base URL dengan ID AoqrObject untuk membuat URL hardcoded
        $hardcodedUrl = $baseUrl . '/object/' . $aoqrObject->id;

        // Generate QR code dengan ukuran 300x300 dan margin (padding) 30
        $qrCode = QrCode::size(300)   // Ukuran QR Code
                        ->margin(3)  // Menambahkan padding/margin sekitar QR Code
                        ->generate($hardcodedUrl);

        // Tentukan nama file untuk QR Code
        $qrCodeFileName = 'qr_' . $aoqrObject->name_english . '.svg';

        // Simpan file QR Code ke folder public/images/qrcode
        file_put_contents(public_path('images/qrcode/' . $qrCodeFileName), $qrCode);

        // Update field qr_image_url di database
        $aoqrObject->qr_image_url = 'images/qrcode/' . $qrCodeFileName;
        $aoqrObject->save();

        return redirect()->route('admin.aoqr_objects.view_qrcode', $aoqrObject->id)->with('success', 'QR Code generated successfully');
    }

}
