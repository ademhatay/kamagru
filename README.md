# Kamagru Full Stack Web Uygulaması

## Açıklama

Bu proje, kullanıcıların web kameralarıyla fotoğraf çekmelerine ve üzerine çıkartmalar eklemelerine olanak tanıyan tam teşekküllü bir web uygulamasıdır. Kullanıcılar, oluşturdukları fotoğrafları web sitesine yükleyebilir ve galeri bölümünde görüntüleyebilirler. Ayrıca, kendi fotoğraflarını galeriden silebilirler.

Uygulama PHP, HTML, CSS ve JavaScript kullanılarak geliştirilmiştir. Kullanıcı bilgileri ve fotoğraflar MySQL veritabanında saklanır. Keyifli kullanımlar!

## Docker

Bu proje Docker kullanır. `docker-compose.yml` dosyası üç adet container oluşturur: web sunucusu, veritabanı ve phpMyAdmin arayüzü için. 

* Web sunucusu container'ı `build/php` dizinindeki `Dockerfile` ile oluşturulur.
* Veritabanı container'ı `mariadb:10.11-jammy` imajı kullanılarak oluşturulur.
* phpMyAdmin container'ı `phpmyadmin/phpmyadmin` imajı kullanılarak oluşturulur.

## Kurulum

### Otomatik Kurulum (Önerilen)

1. Projeyi klonlayın:
   ```bash
   git clone https://github.com/ademhatay/kamagru
   cd kamagru
   ```

2. Docker container'ları başlatın:
   ```bash
   docker-compose up -d --build
   ```

3. Tarayıcınızda `http://localhost/page/register.php` adresine gidin ve kayıt olun!

**Not:** Veritabanı ve `users` tablosu otomatik olarak oluşturulur. `.env` dosyası varsayılan ayarlarla gelir, değiştirmenize gerek yoktur.

### Manuel Kurulum (Opsiyonel)

Eğer özel ayarlar kullanmak isterseniz:

1. `.env` dosyasını düzenleyin:
   ```env
   MYSQL_DATABASE=kamagru
   MYSQL_USER=root
   MYSQL_PASSWORD=
   ```

2. (Opsiyonel) `app/controller/credentials.json` dosyası oluşturun:
   ```json
   {
       "DB_HOST": "mysql",
       "DB_NAME": "kamagru",
       "DB_USER": "root",
       "DB_PASS": ""
   }
   ```

3. Container'ları başlatın:
   ```bash
   docker-compose up -d --build
   ```

**Not:** Sistem önce environment değişkenlerini kullanır, bulamazsa `credentials.json` dosyasına bakar.

## Kullanım

- **Ana Uygulama:** http://localhost
- **Kayıt Sayfası:** http://localhost/page/register.php
- **Giriş Sayfası:** http://localhost/page/login.php
- **PHPMyAdmin:** http://localhost:8080

Kullanıcı kaydı ve giriş işlemlerini gerçekleştirebilir, web kameranızla fotoğraf çekebilir, çıkartmalar ekleyebilir ve fotoğraflarınızı galeriye yükleyebilirsiniz.

## Yazar

- [Adem Hatay](https://ademhtay.com)