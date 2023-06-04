Proses Instalasi

1. download/clone projek ini
2. ganti nama file .env.example menjadi .env kemudian ubah baris seperti dibawah ini

DB_CONNECTION=mongodb
DB_DATABASE=inosoft
DB_USERNAME=
DB_PASSWORD=

3. jalankan perintah php artisan generate:key
4. jalankan perintah composer update
5. terakhir jalankan perintah php artisan serve

Untuk menggunakan endpoint yang telah dikerjakan silahkan import file test-backend-inosoft.postman_collection.json pada aplikasi Postman.

note: mohon maaf aplikasi tidak selesai pada unit testing dan auth
