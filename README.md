## Installation

Ini adalah panduan instalasi untuk proyek ini. Harap ikuti langkah-langkah di bawah ini dengan cermat untuk menginstal dan menjalankan aplikasi dengan benar.

1. Lakukan instalasi dengan menjalankan perintah composer berikut di terminal:

```bash
composer install 
```

2. Lakukan dump autoload dengan menjalankan perintah composer berikut:

```bash
composer dump-autoload
```
3. Buat symbolic link untuk penyimpanan dengan menjalankan perintah berikut:

```bash
php artisan storage:link
```
4. Buat kunci aplikasi dengan menjalankan perintah berikut:

```bash
php artisan key:generate
```
5. Jalankan migrasi untuk membuat tabel-tabel database dengan perintah:

```bash
php artisan migrate
```
6. Jalankan perintah berikut untuk mengisi database dengan data dummy:
```bash
php artisan db:seed
```
```
Role Admin:

Email: admin@admin.com
Password: admin
```

7. Optimalkan aplikasi dengan menjalankan perintah:
```bash
php artisan optimize
```
8. Hapus file cache hasil optimasi dengan perintah:

```bash
php artisan optimize:clear
```

Setelah menyelesaikan langkah-langkah di atas, Anda sekarang siap menjalankan aplikasi. Pastikan konfigurasi lingkungan dan database Anda telah dikonfigurasi dengan benar sebelum melanjutkan.

## Author

[Agung Satrio Wibowo](https://www.linkedin.com/in/agung-satrio/) :email: [Email Me](mailto:web.agungsatrio@gmail.com)

## License

[MIT](https://choosealicense.com/licenses/mit/)