## About  
website di ini di bangun untuk memenuhi test Teknis  yang diberikan oleh  PT.Edukasi Indonesia Jaya
dibangun menggunakan framwork laravel dan tamplate admin bootstrapp. 
untuk menjalankan apps ini perlunya melalkukan setup dan configurasi yang di perlukan:

## setup  

1. jalankan clonning
 git clone https://github.com/alinurd/test-STIMA.git

2.install dan jalan kan npm npm
npm install
npm run dev

3.install composer
composer install

4.untuk menjalankan fitur export excel dan pdf jalankan perintah di bawah
composer require maatwebsite/excel
composer require barryvdh/laravel-dompdf

5.configurasi database.
coppi .env.example menjadi .env 
lalu sesuaikan configurasi database

6. jalankan perintah artisan 
php artisan migrate
php artisan db::seed
php artisan storage:link
php artisan key:generate
php artisan serve

Developer : Ali Nurdin
 