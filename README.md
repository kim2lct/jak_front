# Front End App

This laravel apps just for fun and testing , 
download and try it. :) 

## Instalation
- download .zip from github & extract ke htdocs masing-masing web server
- pastikan server backend sudah berjalan di http://localhost:8000
- run __composer install__
- run __npm install && npm run dev__
- Rename __env.example to .env__
- run __php artisan key:generate && php artisan migrate__ 
- run __php artisan serve --port="8888"__


### Flow

Ketika server up maka akan muncul halaman view products , untuk login anda boleh klik icon orang di kanan atas , untuk menuju login
**default login user**
=====================
email:admin@mail.com
pass:adminku
setelah login anda boleh , melihat table product di backend dengan klik icon orang yang sama , jika ingin register anda boleh klik link register untuk menambahkan user baru.

untuk membuat produk baru anda boleh klik button diatas __add new product__ , maka anda akan masuk ke halaman create product , masukkan valid data maka product akan terbuat dan anda akan dibalikan ke halaman backend product table.

user biasa tidak bisa membuat, mengupdate , dan mendelete product pastikan anda menggunakan user id:1 untuk membuat product.

untuk edit anda boleh klik gambar pencil warna biru , anda akan masuk ke halaman edit product , masukkan valid data maka product akan terupdate dan anda akan melihat pesan success diatas.

untuk delete anda boleh klik gambar tong sampah warna merah , maka akan keluar __pesan apakah anda yang ingin menghapus?__ jika ya maka product yang anda buat akan terhapus.

Terima kasih
*kim2lct*
Have a nice day
