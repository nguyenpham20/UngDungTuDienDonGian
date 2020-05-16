<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!--Tao form tim kiem -->
<form method="get">
        <h1>Tu Dien Anh-Viet</h1>
        <input type="text" name="search" placeholder="Nhap tu can tim" />
        <button type="submit" name="Tim">Tim</button>
</form>
<?php
//Tao danh sach theo mang
$dictionary = ["Hello" => "Xin chao", "how" => "The nao", "Book" => "Quyen vo", "Computer" => "May tinh"];
//Kiem tra neu phuong thuc gui len server la post thi su dung cau lenh ben trong if
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //lay gia tri nhap vao tu form
    $searchWord = $_GET ['search'];
    //Tao bien flag mac dinh la khong tin thay
    $flag = 1;
    //Su dung vong lap foreach de duyet mang $dictionary thong qua cac cap key
    foreach ($dictionary as $word => $description) {
        //Kiem tre neu tu nhap vao trung voi ten tu dien thi hien thi tu: $word. Nghia cua tu: $description
        if ($word == $searchWord) {
            //Hien thi muon thong bao
            echo "Tu: " . $word . ". <br/>Nghia cua tu: " . $description;
            echo "<br/>";
            //Gan bien flag = 1 da tim thay
            $flag = 2;
        }
    }
    //Kiem tra neu $flag = 0 thi hien thi khong tim thay
    if ($flag == 1  ) {
        echo "Khong tim thay tu can kiem tra";
    }
}
?>
</body>
</html>