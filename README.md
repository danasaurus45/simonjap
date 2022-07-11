# Web Sistem Informasi Jumlah Penduduk dengan CodeIgniter 3

## Tentang
Web ini berisikan sistem informasi rekap jumlah penduduk Kota Malang yang didapatkan dari data milik **Dispendukcapil Kota Malang**. Web ini dibuat dengan menggunakan framework CodeIgniter 3, database MySQL dan bootstrap AdminLTE 3.

## Instalasi
1. Clone repository ini ke direktori lokal anda dengan perintah :
    
    ``git clone https://github.com/AgustinaVivi/CI-SIMONJAP.git``

    atau download file .zip nya lalu ekstrak ke direktori lokal anda.

2. Instal packages composer dengan mengetikkan perintah : 

    ``composer install``.

3. Konfigurasi file **application/config/config.php** sesuai dengan preferensi anda jika diperlukan, jika tidak bisa dilewati.

4. Konfigurasi file **application/config/database.php** sesuai dengan database anda jika diperlukan, jika tidak bisa dilewati.

5. Buat tabel ke database dengan mengetikkan perintah : 

    ``php index.php tools migrate``

6. Pada project ini sudah terdapat beberapa data yang dapat diisikan ke masing - masing tabel. Untuk mengisi tabel tersebut dengan data yang kita punya dapat dilakukan dengan perintah : 

    ``php index.php tools seed UsersSeeder``

    ``php index.php tools seed KecamatanSeeder``

    ``php index.php tools seed TotalPendudukSeeder``

    ``php index.php tools seed AgamaSeeder``

    ``php index.php tools seed UmurSeeder``

    ``php index.php tools seed TotalKkSeeder``

    ``php index.php tools seed IdentitasSeeder``

7. Untuk menjalankan aplikasi, buka browser anda lalu ketikkan alamat [localhost/simonjap](http://localhost/simonjap)
