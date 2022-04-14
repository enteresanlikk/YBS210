# Ödev 2

Bir MySql veritabanına erişim bilgileri şu şekildedir: (sunucu adresi: "localhost", kullanıcı adı: "root", şifre: "sifrem", veritabanı adı: "dunya").

"dunya" isimli veritabanına PHP mysqli ile bağlanarak, "SELECT ulke_ismi FROM ulkeler" SQL sorgusu için çıkan sonuçları alan ve bu sonuçların içinden  "A" harfi ile başlayan ülke isimlerini istemciye JSON formatında gönderen bir PHP kodu yazınız. "A" ile başlayan ülkeleri veritabanı tarafında SQL sorgusu ile filtrelemeyiniz (PHP tarafında filtreleme yapınız) ve PHP'den gönderilecek cevapta XSS (cross-site scripting) güvenlik riski olmamalıdır (ipucu: htmlspecialchars()).