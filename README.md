# Proyek Portal Berita - Laravel Livewire

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-4d52d1?style=for-the-badge)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

Ini adalah dokumentasi resmi untuk Proyek Portal Berita.

---

## 1. Deskripsi Proyek

**Portal Berita** adalah sebuah aplikasi web yang berfungsi sebagai platform untuk mempublikasikan dan mengelola artikel berita secara online. Proyek ini dibangun menggunakan framework **Laravel** untuk backend dan **Livewire** untuk menciptakan antarmuka yang dinamis dan reaktif tanpa perlu menulis banyak kode JavaScript.

### Fitur Utama:
- **Manajemen Artikel:** Admin dapat membuat, membaca, memperbarui, dan menghapus (CRUD) artikel berita.
- **Manajemen Kategori:** Mengelompokkan artikel ke dalam kategori yang relevan.
- **Tampilan Publik:** Pengunjung dapat melihat daftar artikel terbaru, mencari artikel, dan membacanya.
- **Antarmuka Interaktif:** Fitur seperti pencarian dan paginasi halaman dibuat lebih responsif menggunakan Livewire.
- **Otentikasi:** Sistem login untuk administrator yang mengelola konten.

---

## 2. Tahapan Instalasi

Untuk dapat menjalankan proyek ini di lingkungan lokal Anda, ikuti langkah-langkah instalasi berikut.

### Prasyarat Sistem
Pastikan perangkat Anda telah terinstal perangkat lunak berikut:
- **PHP >= 8.3**
- **Composer**
- **Node.js & NPM**
- **MySQL**

### Langkah-langkah Instalasi
1.  **Clone Repository**
    Buka terminal atau command prompt, lalu clone repository ini ke direktori lokal Anda.
    ```bash
    git clone https://github.com/diorizqi404/news-portal.git
    cd news-portal
    ```

2.  **Install Dependensi PHP**
    Install semua paket PHP yang dibutuhkan menggunakan Composer.
    ```bash
    composer install
    ```

3.  **Install Dependensi JavaScript**
    Install semua paket JavaScript yang dibutuhkan menggunakan NPM.
    ```bash
    npm install
    ```

4.  **Buat File Environment**
    Salin file `.env.example` menjadi `.env`. File ini akan berisi semua konfigurasi proyek Anda.
    ```bash
    cp .env.example .env
    ```

5.  **Generate Application Key**
    Buat kunci enkripsi unik untuk aplikasi Laravel Anda.
    ```bash
    php artisan key:generate
    ```

6.  **Konfigurasi Database**
    Buka file `.env` dan sesuaikan konfigurasi database berikut dengan pengaturan lokal Anda:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=user_database_anda
    DB_PASSWORD=password_database_anda
    ```
    **Penting:** Pastikan Anda sudah membuat database `nama_database_anda` di server database Anda.

Instalasi selesai! Proyek Anda sekarang siap untuk dijalankan.

---

## 3. Tahapan Menjalankan

Setelah instalasi berhasil, ikuti langkah berikut untuk menjalankan aplikasi. Anda perlu membuka **dua terminal** terpisah.

1.  **Terminal 1: Menjalankan Server Backend**
    Jalankan server development lokal Laravel.
    ```bash
    php artisan serve
    ```
    Secara default, aplikasi akan berjalan di `http://127.0.0.1:8000`.

2.  **Terminal 2: Menjalankan Server Frontend (Vite)**
    Compile aset frontend (CSS, JS) dan jalankan dalam mode *watch* untuk development.
    ```bash
    npm run dev
    ```
    Proses ini akan terus berjalan untuk mengkompilasi ulang aset secara otomatis setiap kali ada perubahan pada file frontend.

3.  **Akses Aplikasi**
    Buka browser Anda dan kunjungi alamat berikut:
    [http://127.0.0.1:8000](http://127.0.0.1:8000)git 

Aplikasi portal berita Anda sekarang sudah berjalan dan siap digunakan.