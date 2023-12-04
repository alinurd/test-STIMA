 
 

## setup  

1. jalankan clonning
 <p>git clone https://github.com/alinurd/test-STIMA.git </p>
lalu masuk ke direkotory cd test-STIMA
2. install dan jalan kan npm npm
<p>npm install</p>
<p>npm run dev </p>

3. install composer
<p>composer install</p>

4. untuk menjalankan fitur export excel dan pdf jalankan perintah di bawah
<p>composer require maatwebsite/excel </p>
<p>composer require barryvdh/laravel-dompdf</p>

5. configurasi database.
<p>coppi .env.example menjadi .env  lalu sesuaikan configurasi database</p>

6. configurasi email smtp.
sesuiakan aku smtp, jika tidak ada bisa menggunakan settingan seperti di bawah
<p>MAIL_MAILER=smtp</p>
<p>MAIL_HOST=smtp.gmail.com</p>
<p>MAIL_PORT=587  atau 465 </p>
<p>MAIL_USERNAME=ali.nrdn14005@gmail.com</p>
<p>MAIL_PASSWORD= </p>
<p>MAIL_ENCRYPTION=tls</p>
<p>MAIL_FROM_ADDRESS=ali.nrdn14005@gmail.com</p>
 
7. jalankan perintah artisan 
<p>php artisan migrate</p>
<p>php artisan db:seed</p>
<p>php artisan storage:link</p>
<p>php artisan key:generate</p>
<p>php artisan serve</p>

akses admin
<p>username:ali.nrdn14005@gmail.com></p>
<p>password:ali.nrdn14005@gmail.com></p>
Developer : Ali Nurdin
 
