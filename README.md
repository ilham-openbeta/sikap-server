# Sistem Informasi Kerja Praktek - Backend
Aplikasi ini digunakan untuk memudahkan mahasiswa, dosen, dan akademik dalam pendaftaran Kerja Praktek. Aplikasi ini merupakan bagian web GUI dan API dari aplikasi sikap yang dibuat menggunakan bahasa pemrograman PHP. Pengguna utama aplikasi ini adalah Dosen dan Mahasiswa. Akademik menggunakan aplikasi [sikap-front](https://github.com/ilham-openbeta/sikap-front). Aplikasi dibuat menggunakan CodeIgniter 3.1.3.

Beberapa fitur pada aplikasi ini yaitu :
- Formulir pendaftaran kerja praktek untuk mahasiswa
- Melihat progress kerja praktek setiap mahasiswa untuk dosen

## Screenshot
### Menu Mahasiswa
[![mahasiswa](https://github.com/ilham-openbeta/sikap-server/raw/master/screenshot/mahasiswa.png)](https://github.com/ilham-openbeta/sikap-server/raw/master/screenshot/mahasiswa.png)

### Menu Dosen
[![dosen](https://github.com/ilham-openbeta/sikap-server/raw/master/screenshot/dosen.png)](https://github.com/ilham-openbeta/sikap-server/raw/master/screenshot/dosen.png)

## Cara Install :
Syarat kebutuhan aplikasi :
- Apache Server
- PHP 5.6+
- MySQL / MariaDB

Cara install :
1. Download atau clone repositori ini.
2. Pindahkan isi folder sikap ke document root apache server (misal /var/www/html)
3. Pastikan modul mod_rewrite pada apache sudah aktif (default linux mati).
4. Atur alamat base_url pada file "sikap/application/config/config.php" isi dengan alamat website untuk projek ini (misal localhost/sikap).
5. Atur koneksi database pada file "sikap/application/config/database.php".
6. Import database sikap.sql.
7. Buka website. Untuk mahasiswa dapat menggunakan akun berikut :
Username=8115003,Password=8115003
8. Untuk Dosen bisa menggunakan akun berikut : 
Username=19670308, Password=19670308

## API
RESTful API digunakan untuk memberikan akses ke aplikasi [sikap-front](https://github.com/ilham-openbeta/sikap-front). Semua API dilindungi dengan Basic Authentication HTTP Header dengan akun akademik (admin,admin123).
Semua alamat API dapat dilihat pada file "sikap/application/config/routes.php". Dan data yang dibutuhkan dapat dilihat dimasing-masing model yang digunakan pada direktori "sikap/application/models/"

## Catatan
Aplikasi ini digunakan dibuat untuk menyelesaikan tugas mata kuliah kerja bengkel. Aplikasi tidak pernah diimplementasikan. Data pada aplikasi hanyalah data palsu. Logo UGM milik UGM.
