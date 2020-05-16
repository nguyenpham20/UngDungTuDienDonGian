# UngDungTuDienDonGian

Bước 1: Tạo file index.php, sử dụng mã html để tạo form tra cứu từ Anh – Việt như hình.



Mã HTML có thể như sau:

<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>
        <style> 
        input[type=text] {
            width: 300px;
            font-size: 16px;
            border: 2px solid #ccc; 
            border-radius: 4px;
            padding: 12px 10px 12px 10px;
        }
        #submit {
            border-radius: 2px;
            padding: 10px 32px;
            font-size: 16px;
        }
        </style>
    </head>
    <body>
       <h2>Từ Điển Anh - Việt</h2>
       <form>
          <input type="text" name="search" placeholder="Nhập từ cần tìm"/>
          <input type = "submit" id = "submit" value = "Tìm"/>
       </form>
    </body>
    </html>
Bước 2: Quy định thuộc tính method của thẻ form là POST.

Bước 3: Xử lý tìm từ.

- Tạo mảng chứa danh sách các từ có sẵn:

$dictionary = array("hello"=>"xin chào", "how"=>"thế nào", "book"=>"quyển vở", "computer"=>"máy tính");
Trong mảng này: array là hàm để tạo mảng. Với hello, how, book, computer là các key; xin chào, thế nào, quyển vở, máy tính là các giá trị ứng với từng key.

Ký hiệu => được sử dụng để xác định key ứng với từng value. Mỗi một cặp key, value được phân cách nhau bởi dấu phẩy.

Lưu ý: Trong trường hợp của bài tập này, danh sách các từ được định nghĩa sẵn với rất ít từ. Trong thực tế, danh sách từ này rất nhiều và thường được lưu trữ vào trong các Cơ sở dữ liệu lớn.

- Kiểm tra nếu $_SERVER["REQUEST_METHOD"] là POST thì:

Lấy giá trị từ nhập vào từ form: $searchword = $_POST["search"];
Tạo biến $flag gán mặc định bằng 0, tức là không tìm thấy từ.
Duyệt toàn bộ từ trong mảng.
Kiểm tra nếu từ nhập trùng với từ có trong danh sách tạo sẵn. Nếu có từ hiển thị từ đó và nghĩa của từ vừa tìm được.
Gán biến $flag = 1 (từ đã tìm thấy).
Sau khi kết thúc lặp. Kiểm tra nếu $flag == 0 thì hiển thị “Không tìm thấy từ cần tra”.
Đoạn mã xử lý tìm từ:

<?php
$dictionary = array(
    "hello"=>"xin chào", 
    "how"=>"thế nào", 
    "book"=>"quyển vở", 
    "computer"=>"máy tính");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $searchword = $_POST["search"]; 
  $flag = 0;
  foreach($dictionary as $word => $description) {
     if($word == $searchword){
        echo "Từ: " . $word . ". <br/>Nghĩa của từ: " . $description;
        echo "<br/>";
        $flag = 1;
     }
  } 

  if($flag == 0){
     echo "Không tìm thấy từ cần tra.";
  }
}
?>
Trong vòng lặp foreach($dictionary as $word => $description):

foreach, as là các từ khóa tạo thành cú pháp duyệt mảng.
$dictionary là tên mảng chứa bộ từ và nghĩa của từ.
$word là key để duyệt từng phần tử trong mảng.
$description là value của từng key trong mảng.
Bước 4: Chạy chương trình

- Nhập một từ có trong danh sách và quan sát kết quả

- Nhập một từ bất kỳ không có trong danh sách và quan sát kết quả

- Thay POST bằng GET chạy lại chương trình và so sánh kết quả.
