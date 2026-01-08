# Sistem Penjualan Tiket Event 

Aplikasi Sistem Penjualan Tiket Event merupakan sebuah aplikasi berbasis web yang dikembangkan untuk memudahkan proses pengelolaan dan penjualan tiket event secara terkomputerisasi. Aplikasi ini dibuat sebagai Project UAS Praktikum dengan tujuan menerapkan konsep pemrograman Object Oriented Programming (OOP), arsitektur Model–View–Controller (MVC), serta mekanisme Routing Application menggunakan file ```.htaccess```.

Melalui aplikasi ini, proses yang sebelumnya dilakukan secara manual seperti pencatatan event, penjualan tiket, dan rekap transaksi dapat dilakukan secara lebih efisien, terstruktur, dan aman. Sistem ini juga dilengkapi dengan fitur autentikasi pengguna yang membedakan hak akses antara admin dan user, sehingga pengelolaan data menjadi lebih terkontrol.


## Identitas Mahasiswa

Nama: Marsya Nabila Putri

NIM: 312410338

Kelas: TI.24.A4

Matakuliah: Pemograman Web 1

## 👨‍🎓 Informasi Umum

Jenis Project : Project UAS Praktikum

Bahasa Pemrograman : PHP Native (OOP)

Database : MySQL / MariaDB

Web Server : Apache (XAMPP)

Konsep : MVC + Routing (.htaccess)

Tampilan : CSS (custom, tema pink)


## Tautan Links

- Penjelasan Video (YouTube):


## Struktur Folder
```
penjualan_tiket/
│
├── app/
│ ├── controllers/
│ │ ├── AuthController.php
│ │ ├── DashboardController.php
│ │ ├── EventController.php
│ │ └── TransaksiController.php
│ │
│ ├── core/
│ │ ├── Controller.php
│ │ ├── Router.php
│ │ └── Database.php
│ │
│ ├── models/
│ │ ├── User.php
│ │ ├── Event.php
│ │ └── Transaksi.php
│ │
│ └── views/
│ ├── auth/
│ ├── admin/
│ ├── user/
│ └── layout/
│
├── public/
│ ├── css/
│ ├── js/
│ └── index.php
│
├── .htaccess
└── README.md 
```

## ⚙️ Cara Menjalankan Aplikasi

1. Install XAMPP

2. Jalankan Apache dan MySQL

3. Pindahkan folder ```penjualan_tiket``` ke:
     ```c:/xampp/htdocs/```

4. Import database ke phpMyAdmin

5. Buka browser dan akses:
    ```http://localhost/penjualan_tiket/auth/login```

## Fitur Aplikasi

🔐 Autentikasi

- Login User

- Register User

- Logout

- Session management


👥 Role User

- Admin

- Kelola data event (CRUD)

- Melihat data transaksi

- Pencarian & pagination transaksi

- User

- Melihat daftar event

- Melakukan pembelian tiket
  

🎫 Event

- Tambah event

- Edit event

- Hapus event

- Lihat daftar event


💰 Transaksi

- Simpan transaksi pembelian tiket

- Tampilkan data transaksi


## Akun Login

### Admin

- Email: ```admin@gmail.com```

- Password: ```password```

## Proses Pembuatan Aplikasi

### Pembuatan Database 

<img width="1919" height="787" alt="image" src="https://github.com/user-attachments/assets/f5d8d3dd-536e-4e0d-ae86-cda190fec508" />


### Struktur Folder VSC

<img width="258" height="420" alt="image" src="https://github.com/user-attachments/assets/afee83aa-95cf-4e76-bf4e-60bd6a914ad1" />

### Routing (.htaccess)

```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ public/index.php?url=$1 [QSA,L]
```

Baris ini mengaktifkan mod_rewrite di Apache untuk membuat URL lebih rapi (friendly URL).

- RewriteCond %{REQUEST_FILENAME} !-f → melewati jika URL mengarah ke file yang ada.

- RewriteCond %{REQUEST_FILENAME} !-d → melewati jika URL mengarah ke folder yang ada.

- RewriteRule ^(.*)$ public/index.php?url=$1 [QSA,L] → semua permintaan lain diarahkan ke public/index.php dengan parameter url, sehingga aplikasi bisa memproses routing melalui satu titik masuk.

### Halaman Login

### Dashboard Admin

### CRUD Kategori

## Kesimpulan 

Berdasarkan hasil perancangan dan implementasi Sistem Penjualan Tiket Berbasis Web, dapat disimpulkan bahwa sistem ini berhasil dibangun dengan menerapkan arsitektur Model–View–Controller (MVC) yang memisahkan antara logika aplikasi, pengolahan data, dan tampilan antarmuka pengguna. Penerapan pola MVC membuat struktur program lebih terorganisir, mudah dipahami, serta memudahkan proses pengembangan dan pemeliharaan sistem di masa mendatang.



