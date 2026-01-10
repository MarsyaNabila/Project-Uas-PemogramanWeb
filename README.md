# Sistem Penjualan Makanan

FoodApp adalah aplikasi Sistem Penjualan Makanan berbasis Web yang dibuat menggunakan PHP Native dengan konsep MVC.
Aplikasi ini dikembangkan untuk memenuhi tugas Ujian Akhir Semester (UAS) Pemrograman Web dengan tujuan menerapkan konsep pemrograman Object Oriented Programming (OOP), arsitektur Model–View–Controller (MVC), serta mekanisme Routing Application menggunakan file ```.htaccess```.

FoodApp memiliki dua peran pengguna, yaitu Admin dan User.
Admin dapat mengelola data produk dan melihat transaksi, sedangkan User dapat membeli makanan dan melakukan transaksi secara otomatis.


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



## Struktur Folder
```
│
├── app/
│ ├── controllers/
│ │ ├── AuthController.php
│ │ ├── DashboardController.php
│ │ ├── ProdukController.php
│ │ ├── TransaksiController.php
│ │ └── UserController.php
│ │
│ ├── models/
│ │ ├── User.php
│ │ ├── Produk.php
│ │ └── Transaksi.php
│ │
│ ├── views/
│ │ ├── layout/
│ │ │ ├── header.php
│ │ │ └── footer.php
│ │ ├── dashboard/
│ │ │ └── index.php
│ │ ├── produk/
│ │ ├── transaksi/
│ │ └── user/
│ │ └── dashboard.php
│
├── core/
│ ├── Controller.php
│ ├── Database.php
│ └── Auth.php
│
├── public/
│ ├── css/
│ │ └── style.css
│ ├── images/
│ │ └── produk/
│ │ ├── ayam.jpg
│ │ ├── burger.jpg
│ │ └── pizza.jpg
│ └── index.php
│ └── .htaccess
│
└── README.md
```

## Cara Menjalankan Aplikasi

1. Install XAMPP

2. Jalankan Apache dan MySQL

3. Pindahkan folder ```penjualan_tiket``` ke:
     ```c:/xampp/htdocs/```

4. Import database ke phpMyAdmin

5. Buka browser dan akses:
    ```http://localhost/penjualan_tiket/auth/login```

## Fitur Utama

- Login & Logout (Admin & User)
  
- Multi Role (Admin / User)
  
- Dashboard berbeda sesuai role
  
- CRUD Produk
  
- Upload & tampil gambar produk
  
- Search produk
  
- Pagination produk
  
- Transaksi penjualan
  
- Stok otomatis berkurang
  
- Tampilan UI sederhana & menarik (Pink Theme)
  
- Struktur MVC (Model View Controller)

## Role Pengguna

Admin bertugas mengelola sistem, meliputi:
- Login Admin
  
- Dashboard Admin
  
- Kelola data produk (CRUD)
  
- Melihat data transaksi
  
- Logout

User bertugas melakukan pembelian, meliputi:
- Login User
  
- Dashboard User
  
- Melihat daftar produk
  
- Membeli makanan
  
- Transaksi otomatis
  
- Logout

## Akun Login

### Admin

- Username : admin

- Password : admin123

### User

- Username : user

- Password : user123



## Proses Pembuatan Aplikasi

### Pembuatan Database 

<img width="1917" height="1075" alt="image" src="https://github.com/user-attachments/assets/781e271b-3131-4f58-89cd-2d7e3aba99dd" />


### Struktur Folder VSC

<img width="329" height="990" alt="image" src="https://github.com/user-attachments/assets/97a314f3-7b68-4985-b42f-c28a0489f8c9" />


### Routing (.htaccess)

```
RewriteEngine On
RewriteBase /makanan_penjualan/

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ public/index.php?url=$1 [L]
```

Kode `.htaccess` tersebut digunakan untuk mengaktifkan fitur URL rewriting pada Apache agar aplikasi dapat menggunakan sistem routing MVC. Semua request yang masuk akan diarahkan ke file `public/index.php`, selama URL yang diakses bukan file atau folder yang benar-benar ada. Dengan cara ini, URL menjadi lebih rapi tanpa ekstensi `.php`, dan seluruh proses pengaturan controller serta method dapat dikendalikan dari satu file utama.


### Halaman Login

<img width="940" height="1079" alt="image" src="https://github.com/user-attachments/assets/e2d6e397-d106-4419-adbb-93a2b425f6eb" />



### Dashboard Admin

<img width="950" height="1079" alt="image" src="https://github.com/user-attachments/assets/1d5d4501-de5e-461d-bf8d-bef9981f3bc1" />


### Halaman Produk

<img width="948" height="1079" alt="image" src="https://github.com/user-attachments/assets/07f5e83f-5c4f-4d25-b6da-45f7627a08eb" />

## Halaman Tambah Makanan

<img width="940" height="1077" alt="image" src="https://github.com/user-attachments/assets/fe900578-1b90-473e-8d17-f93a8e8efbc9" />


## Halaman Transaksi

<img width="941" height="1079" alt="image" src="https://github.com/user-attachments/assets/4a31824b-83e2-4104-b189-111a16099c54" />




## Kesimpulan 
Sistem Penjualan Makanan berbasis web ini membantu proses pengelolaan produk dan transaksi menjadi lebih terstruktur dan efisien. Dengan adanya pembagian peran antara Admin dan User, sistem mampu mengelola data produk, transaksi, serta stok secara otomatis. Penerapan konsep MVC membuat aplikasi lebih rapi, mudah dipahami, dan mudah dikembangkan, sehingga sistem ini layak digunakan sebagai solusi sederhana penjualan makanan secara online.




