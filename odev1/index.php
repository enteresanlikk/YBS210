<?php

function sifre_gucunu_hesapla($pass) {
    $total = 0;

    // En az 8 karakter ve en fazla 20 karakter => 20 puan
    $passLen = strlen($pass);
    if($passLen >= 8 && $passLen <= 20) {
        $total += 20;
    }

    // En az 3 tane küçük harf => 20 puan
    $lowerCharCount = preg_match_all('/[a-z]/', $pass);
    if($lowerCharCount >= 3) {
        $total += 20;
    }

    // En az 3 tane büyük harf => 20 puan
    $upperCharCount = preg_match_all('/[A-Z]/', $pass);
    if($upperCharCount >= 3) {
        $total += 20;
    }

    // En az 3 tane rakam => 20 puan
    $digitCount = preg_match_all('/[0-9]/', $pass);
    if($digitCount >= 3) {
        $total += 20;
    }

    // En az 3 tane özel karakter => 20 puan, özel karakterler: _!#[]()
    $specialCharCount = preg_match_all('/[_!#[\\]()]/', $pass);
    if($specialCharCount >= 3) {
        $total += 20;
    }

    return "$total puan";
}

function fibonacci_serisinde_mi($number) {
    $n1 = 0;
    $n2 = 1;

    while($n2 < $number) {
        $n3 = $n1 + $n2;

        $n1 = $n2;
        $n2 = $n3;
    }

    return $number == $n2 ? 'TRUE' : 'FALSE';
}

?>

<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödev 1</title>
</head>
<body>
    <h2>
        Şifre Gücü Hesapla
    </h2>
    <form action="" method="post">
        <?php
            $password = $_POST["password"] ?? '';
        ?>
        
        <input type="text" name="password" required value="<?= $password ?>"/>
        <input type="submit" name="sifrePuanHesapla">

        <?php if(isset($_POST["sifrePuanHesapla"])): ?>
            <h3>
                <?= sifre_gucunu_hesapla($password); ?>
            </h3>
        <?php endif; ?>
    </form>

    <hr>

    <h2>
        Fibonacci Serisinde mi?
    </h2>
    <form action="" method="post">
        <?php
            $fib = $_POST["fib"] ?? '';
        ?>

        <input type="number" name="fib" required value="<?= $fib ?>"/>
        <input type="submit" name="fibonacciHesapla">

        <?php if(isset($_POST["fibonacciHesapla"])): ?>
            <h3>
                <?= fibonacci_serisinde_mi($fib); ?>
            </h3>
        <?php endif; ?>
    </form>
</body>
</html>