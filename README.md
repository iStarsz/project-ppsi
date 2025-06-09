### **Konsep Book Aplikasi Ambarrukmo Object QR (AOQR)**
---

#### 1. **Judul Aplikasi**
**Ambarrukmo Object QR (AOQR)**

#### 2. **Deskripsi Singkat**
AOQR adalah aplikasi berbasis web yang membantu pengelola hotel untuk menginput dan menampilkan informasi objek-objek di hotel secara interaktif. Pengunjung dapat mengakses informasi objek dengan cara memindai QR code yang terpasang di dekat objek, yang kemudian akan mengarahkan mereka ke halaman detail objek di website.

#### 3. **Fitur Utama**
- **Admin Dashboard:**
  - Input dan manajemen data objek (nama objek, deskripsi, gambar, lokasi, dsb.).
  - Upload gambar objek.
  - Generate QR code unik untuk setiap objek yang ditautkan ke halaman publik objek tersebut.
  - Download QR code untuk dicetak dan dipasang di hotel.
  
- **Halaman Publik (Frontend):**
  - Halaman detail objek yang diakses melalui scan QR code.
  - Menampilkan informasi lengkap objek: gambar, nama, deskripsi, dll.
  - Layout responsif dan mudah diakses dari berbagai perangkat (desktop, mobile, tablet).

#### 4. **Teknologi yang Digunakan**
- **Framework (Laravel Monolith)**:
  - Laravel sebagai backend dan frontend dalam satu aplikasi.
  - Blade Templates untuk tampilan frontend dan admin dashboard.
  - Database: MySQL atau PostgreSQL untuk penyimpanan data objek hotel.
  - Library: `QrCode` untuk generate QR code.
  
- **UI/UX**:
  - `Tailwind CSS` untuk tampilan modern dan responsif.
  - `Blade templating engine` untuk frontend.
  
- **Authentication**: 
  - Menggunakan **Middleware** untuk autentikasi admin.

- **Deployment**:
  - Deployment di **VPS (DigitalOcean, Linode, Vultr, dll.)** dengan **Nginx dan PHP-FPM**.
  - Database di **Managed MySQL/PostgreSQL** atau self-hosted di VPS.

#### 5. **Flow Aplikasi**
1. **Admin Login** → Admin login ke dashboard untuk menginput data objek hotel.
2. **Input Data Objek** → Admin memasukkan detail objek, seperti nama, deskripsi, gambar, dan kategori.
3. **Generate QR Code** → Setelah input, sistem generate QR code yang akan mengarahkan ke halaman publik objek tersebut.
4. **Tampilkan di Halaman Publik** → Pengunjung scan QR code dan diarahkan ke halaman yang menampilkan detail objek.
5. **Maintenance Data** → Admin dapat meng-update atau menghapus informasi objek di dashboard jika diperlukan.

---

### **Timeline Pengerjaan**
---

Total durasi proyek: **4 bulan**  
Pembagian waktu: **2 bulan development**, **1 bulan deployment dan testing**, **1 bulan dokumentasi & release**.

#### **Bulan 1-2 (Development Phase)**
1. **Minggu 1-2: Setup Project & Database**
   - Setup Laravel project dengan struktur monolith.
   - Setup database (MySQL/PostgreSQL).
   - Buat model dan migration untuk tabel objek hotel.
   - Implementasi fitur CRUD data objek hotel di Laravel.

2. **Minggu 3-4: Admin Dashboard**
   - Buat route dan controller untuk input data objek hotel.
   - Implementasi fitur untuk generate QR code menggunakan `simple-qrcode`.
   - Buat halaman list, edit, dan delete objek hotel di Blade Templates.
   - Setup autentikasi admin menggunakan Laravel Breeze/Fortify.
   
3. **Minggu 5-6: Halaman Publik**
   - Buat route untuk menampilkan detail objek berdasarkan QR code.
   - Buat tampilan halaman publik menggunakan Blade & Tailwind CSS.
   - Setup interaksi UI menggunakan Alpine.js atau Livewire.

4. **Minggu 7-8: Finalisasi Admin Dashboard**
   - Integrasi fitur upload gambar objek.
   - Optimasi UX/UI di dashboard.
   - Uji coba fitur CRUD dan QR code.

#### **Bulan 3 (Deployment & Testing Phase)**
1. **Minggu 9-10: Deployment**
   - Setup VPS dengan **Nginx, PHP, MySQL/PostgreSQL, dan Laravel**.
   - Setup domain dan SSL menggunakan **Let's Encrypt**.
   - Deployment aplikasi ke VPS.

2. **Minggu 11-12: Testing**
   - Testing fungsionalitas dari input admin hingga scan QR code.
   - UAT (User Acceptance Testing) dengan tim internal atau stakeholder.

#### **Bulan 4 (Dokumentasi & Release Phase)**
1. **Minggu 13-14: Penyusunan Dokumentasi**
   - Dokumentasi teknis API (endpoint, request/response).
   - Dokumentasi deployment (setup server, konfigurasi, update).
   - Dokumentasi user guide untuk admin (cara input data, generate QR, dsb.).

2. **Minggu 15-16: Finalisasi & Release**
   - Final review aplikasi sebelum release.
   - Launch aplikasi ke publik.
   - Penyebaran dokumentasi ke tim teknis & stakeholder.

---
