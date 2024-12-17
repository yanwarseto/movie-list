# Dokumentasi Aplikasi

## 1. Teknologi yang Digunakan

Aplikasi ini dibangun dengan teknologi dan layanan berikut:

### **Backend Framework:**
- **CodeIgniter 4**: Framework PHP yang digunakan untuk membangun aplikasi backend. CodeIgniter mempermudah pengembangan aplikasi web dengan pola arsitektur Model-View-Controller (MVC).

### **Database:**
- **PostgreSQL**: Digunakan sebagai database untuk menyimpan data terkait film, seperti detail film dan overview yang diperbarui.

### **External API:**
- **The Movie Database (TMDb) API**: API eksternal digunakan untuk mengambil informasi tentang film, termasuk data seperti judul, poster, dan genre. API ini memungkinkan aplikasi untuk mengakses informasi film yang terus diperbarui.

---

## 2. Service yang Perlu Disiapkan untuk Menjalankan Website

Untuk menjalankan aplikasi ini dengan lancar, Anda perlu mempersiapkan beberapa layanan dan konfigurasi berikut:

### **Layanan yang Diperlukan:**

#### **Web Server:**
- Anda memerlukan web server seperti **Apache** atau **Nginx** untuk menjalankan aplikasi berbasis PHP. Anda juga harus memastikan **PHP versi 7.4** atau yang lebih baru terinstal di server.

#### **Database:**
- **PostgreSQL** harus terinstal dan berjalan di server. Anda juga perlu membuat database yang sesuai dengan konfigurasi yang terdapat di aplikasi.
- Pastikan tabel yang relevan sudah dibuat di database (misalnya `MOVIE.DETAIL_MOV` untuk menyimpan detail film).

#### **API Key untuk TMDb:**
- Diperlukan **API key** untuk mengakses data film dari **The Movie Database (TMDb)**. Anda dapat mendapatkan API key dari [TMDb API](https://www.themoviedb.org/).
- **API key** ini digunakan dalam aplikasi untuk mengambil data film secara otomatis.

---

## 3. Cara Meng-Install Aplikasi

Berikut adalah langkah-langkah untuk menginstall aplikasi ini:

### **Langkah 1: Menyiapkan Web Server**
- Pastikan **PHP 8.0** atau lebih baru sudah terinstal di server Anda.
- Install **Apache** atau **Nginx** sebagai web server.
- Konfigurasi server agar dapat menjalankan aplikasi PHP.

### **Langkah 2: Menyiapkan Database PostgreSQL**
- Install **PostgreSQL** di server Anda.
- restore sql yang diberikan di repo
- Konfigurasi **username** dan **password** database sesuai dengan file konfigurasi aplikasi (`app/config/Database.php`).

### **Langkah 3: Meng-Clone Aplikasi dan Install Dependencies**
- Clone repository aplikasi ini ke server Anda:
    ```bash
    git clone <repository-url>
    cd <folder-aplikasi>
    ```
- Install dependensi menggunakan **Composer**:
    ```bash
    composer install
    ```

### **Langkah 4: Konfigurasi database**
- Sesuaikan pengaturan **database** :
    ```ini
    database.default.hostname = localhost
    database.default.username = postgres
    database.default.password = rahasia123
    database.default.database = movie_db
    ```

### **Langkah 5: Menyiapkan API Key**
- Daftar di **TMDb** untuk mendapatkan **API Key**.
- Masukkan **API Key** yang  didapatkan ke dalam file **model** `Movie_m.php`, pada bagian:
    ```php
    protected $api_key = '6bfaa39b0a3a25275c765dcaddc7dae7';
    ```

### **Langkah 6: Menjalankan Aplikasi**
- Jalankan web server Anda dan pastikan aplikasi dapat diakses melalui browser.
- Buka codingan dan masuk ke terminal, lalu ketik _php spark serve_.
- Aplikasi seharusnya dapat menampilkan data film dari TMDb dan memungkinkan Anda untuk mengedit sinopsis film.

---

## 4. ERD (Entity-Relationship Diagram)

Untuk aplikasi ini, berikut adalah desain ERD yang menggambarkan relasi antar entitas dalam aplikasi:

### Tabel: DETAIL_MOV
| Field    | Tipe Data | Keterangan                                           |
|----------|-----------|------------------------------------------------------|
| **ID**   | INTEGER   | Primary Key, ID film                                |
| **OVERVIEW** | TEXT     | Deskripsi atau sinopsis film                        |

**ID**: Tabel ini memiliki relasi satu-ke-satu dengan ID film yang diambil dari TMDb.

