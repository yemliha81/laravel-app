- Proje aşağıdaki repo’dan klonlanmalıdır
git clone https://github.com/yemliha81/laravel-app.git
- Projenin kurulacağı bilgisayarda MySQL çalışır durumda olmalı ve proje için bir veritabanı oluşturulmaıdır.
- Oluşturulan veritabanına proje klasörü içindeki book_db.sql veritabanı içe aktarma ile yüklenmelidir.
- Klonlama işleminden sonra laravel-app klasörü içindeki .env dosyasındaki aşağıdaki alanlar güncellenmelidir
DB_DATABASE=book_db
DB_USERNAME=root
DB_PASSWORD=123456
- Terminalden proje klasörüne giriş yapılıp (cd laravel-app) aşağıdaki komut çalıştırılmaıdır.
php artisan serve
- Bu işlemden sonra projeye http://127.0.0.1:8000 url’i üzerinden erişilebilir.
- Veritabanında 1 adet admin kullanıcısı, 1 adet normal kullanıcı bulunmaktadır.

Admin giriş bilgileri,
admin@example.com
şifre: 11111111

Kullanıcı Giriş bilgileri
user@example.com
şifre: 11111111

