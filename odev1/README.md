# Ödev 1

- Kullanıcı tarafından belirlenen şifrenin ne kadar güçlü olduğunu (puan olarak) hesaplayan bir PHP fonksiyonu yazınız. Güçlü bir şifre için puanlama:
    - En az 8 karakter ve en fazla 20 karakter =>20 puan
    - En az 3 tane küçük harf => 20 puan
    - En az 3 tane büyük harf => 20 puan
    - En az 3 tane rakam => 20 puan
    - En az 3 tane özel karakter => 20 puan, özel karakterler: _!#[]()
    
    
    Örnek:
    ```php
    sifre_gucunu_hesapla('gucLUS123') => "80 puan"
    ```

- Fibonacci serisinde yer alan bir sayı kendisinden önceki 2 ardışık sayının toplamıdır. 0, 1, 1, 2, 3, 5, 8, 13, 21, ... 

    Yazacağınız PHP fonksiyonu ile bir sayınının Fibonacci serisinde yer alıp almadığını bulunuz. Fonksiyona gönderilen sayı Fibonacci serisinde yer alıyorsa TRUE, değilse FALSE döndürmelidir.

Örnek:
```php
fibonacci_serisinde_mi(5) => "TRUE"
fibonacci_serisinde_mi(7) => "FALSE"
```