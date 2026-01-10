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


## Fitur Utama

- Login & Logout (Admin & User)
  
- Multi Role (Admin / User)
  
- Dashboard berbeda sesuai role
  
- CRUD Produk
  
- Upload & tampil gambar produk
  
- Search produk
  
- Pagination produk
  
- Transaksi penjualan
  
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

```
CREATE DATABASE penjualan_makanan;
USE penjualan_makanan;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role ENUM('admin','user')
);

CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100),
    harga INT,
    stok INT
);

CREATE TABLE transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total INT,
    tanggal DATETIME
);
```

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

### Halaman Login/Logout Admin (```AuthController.php```)

```php
<?php
require_once "../core/Controller.php";
require_once "../app/models/User.php";

class AuthController extends Controller {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = (new User)->login(
                $_POST['username'],
                $_POST['password']
            );

            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: /makanan_penjualan/dashboard");
                exit;
            }
        }

        $this->view("auth/login");
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /makanan_penjualan/auth/login");
    }
}
```

<img width="940" height="1079" alt="image" src="https://github.com/user-attachments/assets/e2d6e397-d106-4419-adbb-93a2b425f6eb" />


Kode tersebut digunakan untuk mengatur proses login dan logout. Saat login, sistem mengecek data username dan password ke database melalui model User. Jika benar, session dibuat dan data user disimpan, lalu pengguna diarahkan ke halaman dashboard. Jika belum login atau data salah, halaman login tetap ditampilkan.

Pada saat logout, session yang aktif dihapus sehingga pengguna keluar dari sistem dan diarahkan kembali ke halaman login.


### Dashboard Admin (```DashboardController.php```)

```php
<?php
require_once "../core/Auth.php";
require_once "../core/Controller.php";

class DashboardController extends Controller {
    public function index() {
        Auth::check();
        $this->view("dashboard/index");
    }
}
```

<img width="950" height="1079" alt="image" src="https://github.com/user-attachments/assets/1d5d4501-de5e-461d-bf8d-bef9981f3bc1" />

Kode tersebut merupakan controller untuk dashboard yang memastikan hanya pengguna yang sudah login yang dapat mengakses halaman tersebut. File Auth.php digunakan untuk melakukan pengecekan autentikasi, sedangkan Controller.php menyediakan fungsi dasar controller seperti pemanggilan view. Pada method index(), sistem memanggil Auth::check() untuk memastikan session login masih aktif, lalu menampilkan halaman dashboard melalui view dashboard/index.

### Halaman Produk (```ProdukController.php```)

```php
<?php

require_once "../core/Auth.php";
require_once "../core/Controller.php";
require_once "../app/models/Produk.php";

class ProdukController extends Controller
{
    
    public function index()
    {
        Auth::check();

        $model = new Produk();

        // SEARCH
        $keyword = $_GET['q'] ?? '';

        // PAGINATION
        $limit = 5;
        $page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;

        $offset = ($page - 1) * $limit;

        // DATA
        $produk    = $model->searchPaginate($keyword, $limit, $offset);
        $totalData = $model->countSearch($keyword);
        $totalPage = ceil($totalData / $limit);

        // Kirim ke view
        $this->view("produk/index", compact(
            'produk',
            'keyword',
            'page',
            'totalPage'
        ));
    }

    public function create()
    {
        Auth::check();

        if ($_POST) {
            (new Produk)->create(
                $_POST['nama'],
                $_POST['harga'],
                $_POST['stok']
            );

            header("Location: /makanan_penjualan/produk");
            exit;
        }

        $this->view("produk/create");
    }

    public function edit($id)
    {
        Auth::check();

        $model = new Produk();

        if ($_POST) {
            $model->update(
                $id,
                $_POST['nama'],
                $_POST['harga'],
                $_POST['stok']
            );

            header("Location: /makanan_penjualan/produk");
            exit;
        }

        $produk = $model->find($id);
        $this->view("produk/edit", compact('produk'));
    }

    public function delete($id)
    {
        Auth::check();

        (new Produk)->delete($id);

        header("Location: /makanan_penjualan/produk");
        exit;
    }
}
```

<img width="948" height="1079" alt="image" src="https://github.com/user-attachments/assets/07f5e83f-5c4f-4d25-b6da-45f7627a08eb" />

Kode ini adalah controller produk untuk admin yang mengatur fitur kelola makanan. Method index() menampilkan daftar produk lengkap dengan pencarian dan pagination. Method create() digunakan untuk menambah produk baru. Method edit() untuk mengubah data produk, dan method delete() untuk menghapus produk. Semua fungsi dilindungi Auth::check() agar hanya admin yang sudah login yang bisa mengaksesnya.

## Halaman Tambah Makanan (```create.php```)

```php
<form method="POST">
    <input type="text" name="nama" placeholder="Nama Makanan" required>
    <input type="number" name="harga" placeholder="Harga" required>
    <input type="number" name="stok" placeholder="Stok" required>
    <button type="submit">Simpan</button>
</form>
```

<img width="940" height="1077" alt="image" src="https://github.com/user-attachments/assets/fe900578-1b90-473e-8d17-f93a8e8efbc9" />

Kode form ini digunakan untuk menambahkan data makanan. Saat tombol Simpan ditekan, data nama makanan, harga, dan stok akan dikirim ke server menggunakan metode POST. Atribut required memastikan semua input harus diisi sebelum form dikirim.


## Halaman Transaksi (```TransaksiController.php```)

```php
<?php

require_once "../core/Auth.php";
require_once "../core/Controller.php";
require_once "../app/models/Transaksi.php";

class TransaksiController extends Controller
{
    public function index()
    {
        Auth::check();

        $model = new Transaksi();
        $transaksi = $model->getAll();

        $this->view("transaksi/index", compact('transaksi'));
    }

    public function create()
    {
        Auth::check();

        if ($_POST) {
            (new Transaksi)->create(
                $_SESSION['user']['id'],
                $_POST['total']
            );

            header("Location: /makanan_penjualan/transaksi");
            exit;
        }

        $this->view("transaksi/create");
    }
}
```

<img width="941" height="1079" alt="image" src="https://github.com/user-attachments/assets/4a31824b-83e2-4104-b189-111a16099c54" />

Kode ini mengatur halaman transaksi.
Method index() mengecek login, mengambil semua data transaksi dari database, lalu menampilkannya ke halaman daftar transaksi.
Method create() digunakan untuk menambah transaksi baru, di mana data disimpan menggunakan ID user yang sedang login, lalu diarahkan kembali ke halaman transaksi.

## Kesimpulan 
Sistem Penjualan Makanan berbasis web ini membantu proses pengelolaan produk dan transaksi menjadi lebih terstruktur dan efisien. Dengan adanya pembagian peran antara Admin dan User, sistem mampu mengelola data produk, transaksi, serta stok secara otomatis. Penerapan konsep MVC membuat aplikasi lebih rapi, mudah dipahami, dan mudah dikembangkan, sehingga sistem ini layak digunakan sebagai solusi sederhana penjualan makanan secara online.




