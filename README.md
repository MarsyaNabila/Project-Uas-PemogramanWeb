# Sistem Penjualan Tiket Event Berbasis Web

Sistem Penjualan Tiket Event Berbasis Web merupakan aplikasi berbasis **PHP dan MySQL** yang dirancang untuk memudahkan proses pengelolaan event serta pembelian tiket secara online.  
Aplikasi ini dibuat sebagai **Tugas Ujian Akhir Semester (UAS)** dengan menerapkan konsep **OOP, CRUD, dan sistem login multi-role**.


## Identitas Mahasiswa

Nama: Marsya Nabila Putri

NIM: 312410338

Kelas: TI.24.A4

Matakuliah: Pemograman Web 1

## Tautan Links

- Penjelasan Video (YouTube):

## Teknologi yang Digunakan

- PHP 7

- MySQL

- Bootstrap 5 (Framework CSS)

- HTML & CSS

- Apache (XAMPP)


## Struktur Folder
```
PENJUALAN_TIKET/
│
├── index.php
│
├── admin/
│   ├── event.php          # Menampilkan & kelola data event
│   ├── tambah_event.php  # Form tambah event
│   └── hapus_event.php   # Hapus data event
│
├── user/
│   ├── event.php         # Daftar event untuk user
│   ├── beli.php          # Proses pembelian tiket
│   ├── transaksi.php    # Riwayat transaksi user
│   └── struk.php         # Struk pembelian tiket
│
├── auth/
│   ├── login.php         # Halaman login
│   ├── proses_login.php # Proses autentikasi
│   └── logout.php        # Logout & hapus session
│
├── config/
│   └── koneksi.php       # Koneksi database MySQL
│
├── assets/
│   ├── css/
│   │   └── style.css     # Style tampilan aplikasi
│   │
│   └── img/
│       ├── login.png     # Logo login
│       ├── budaya.jpg    # Event budaya
│       ├── konser.jpg    # Event konser
│       └── seminar.jpg   # Event seminar
```

## Fitur Aplikasi

🔐 A. Sistem Login & Logout

Fitur login digunakan untuk membatasi akses ke dalam sistem berdasarkan peran pengguna.

Fungsi utama:

- Autentikasi username dan password

- Pembagian role admin dan user

- Pengamanan halaman menggunakan session

- Logout untuk mengakhiri sesi pengguna


👨‍💼 B. Manajemen Event (Admin)

Admin memiliki akses penuh untuk mengelola data event yang tersedia.

Fitur admin:

- Menampilkan daftar event

- Menambahkan event baru

- Menghapus event

- Menampilkan gambar event

- Mengelola stok tiket
  

👤 C. Daftar Event (User)

User dapat melihat seluruh event yang tersedia lengkap dengan informasi dan gambar.

Fitur user:

- Menampilkan daftar event

- Melihat detail event

- Melihat harga dan stok tiket


🎟️ D. Pembelian Tiket

User dapat melakukan pembelian tiket untuk event tertentu.

Fungsi utama:

- Input jumlah tiket

- Perhitungan total harga

- Penyimpanan data pembelian

- Pengurangan stok tiket otomatis


📄 E. Riwayat Transaksi & Struk

User dapat melihat riwayat pembelian dan mencetak struk tiket.

Fungsi utama:

- Menampilkan data transaksi user

- Menampilkan detail pembelian

- Menyediakan struk pembelian


- Tampilan data dinamis


## Akun Login

### Admin

- Username: ```admin```

- Password: ```admin```

## Proses Pembuatan Aplikasi

### Pembuatan Database 

<img width="1919" height="1078" alt="image" src="https://github.com/user-attachments/assets/390dd536-218e-43e5-9e71-843efdf5e9ff" />

### Struktur Folder VSC

### Routing (.htaccess)

### Halaman Login

### Dashboard Admin

### CRUD Kategori

###



