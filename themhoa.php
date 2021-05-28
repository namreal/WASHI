<?php
    require_once('./_private/bundle.php');
    $tenhoaE = $anhE = $giaE = $motadaiE = $motanganE = $chieucaoE = "";
    $tenhoa = $anh = $gia = $motadai = $moatangan = $chieucao = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST['tenhoa'])){
            $tenhoaE = 'Nhập tên hoa!!!';
        } else{
            $tenhoa = test($_POST['tenhoa']);
        }
        if(empty($_POST['gia'])){
            $giaE = 'Nhập giá trị!!!';
        } else{
            $gia = test($_POST['gia']);
        }
        if(empty($_POST['anh'])){
            $anhE = 'Nhập tên ảnh!!!';
        } else{
            $anh = test($_POST['anh']);
        }
        if(empty($_POST['motadai'])){
            $motadaiE = 'Nhập mô tả chi tiết!!!';
        } else{
            $motadai = test($_POST['motadai']);
        }
        if(empty($_POST['motangan'])){
            $motanganE = 'Nhập mô tả rút gọn!!!';
        } else{
            $motangan = test($_POST['motangan']);
        }
        if(empty($_POST['chieucao'])){
            $chieucaoE = 'Nhập chiều cao!!!';
        } else{
            $chieucao = test($_POST['chieucao']);
        }
    }
    function test($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_POST['uploadclick'])) {
        $tenhoa = isset($_POST['tenhoa']) ? $_POST['tenhoa'] : '';
        $anh = isset($_POST['anh']) ? $_POST['anh'] : '';
        $gia = isset($_POST['gia']) ? $_POST['gia'] : '';
        $motadai = isset($_POST['motadai']) ? $_POST['motadai'] : '';
        $motangan = isset($_POST['motangan']) ? $_POST['motangan'] : '';
        $chieucao = isset($_POST['chieucao']) ? $_POST['chieucao'] : '';
        //Code xử lý, insert dữ liệu vào table

        $sql = "INSERT INTO `hoa` (`tenhoa`, `anh`, `gia`, `motadai`, `motangan`, `chieucao`)
         VALUES ('$tenhoa', '$anh', '$gia', '$motadai', '$motangan', '$chieucao')";
        $exec = $DB->query($sql);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="charset" content="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
        <title>ADMIN</title>
        <link rel="stylesheet" href="assets/css/themhoa.css?v=<?=rand(1,10000)?>">
    </head>
    <body>
    <div class="container">
            <div class="box">
                <img src="assets/images/avt1.png">
                <br>
                <h1>ADMIN  FLOWERSTORE</h1>
                <div id="menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li style="margin-top: 25px"><a href="mngflower.php">Quản lý hoa</a></li>
                        <li style="margin-top: 25px"><a href="mnguser.php">Quản lý người dùng</a></li>
                        <li style="margin-top: 25px"><a href="logout.php">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="box1">
                <form method="POST" enctype="multipart/form-data"> 
                    <h1>Thêm hoa</h1>
                    <div style="padding-bottom: 25px">
                        <span>Tên hoa: </span><input type="text" name="tenhoa" placeholder="Tên hoa">
                    </div>
                    <div style="padding-bottom: 25px">
                        <span>Nhập tên ảnh: </span><input type="text" name="anh" placeholder="Tên ảnh">
                        <br>
                        <b><span style="color: red">* Lưu ý: Nhập cả tên lẫn đuôi của ảnh</span></b>
                    </div>
                    <div style="padding-bottom: 25px">
                            <span>Giá: </span><input type="text" name="gia" placeholder="Giá">
                    </div>
                    <div style="padding-bottom: 25px">
                            <span>Mô tả chi tiết: </span><input type="text" name="motadai" placeholder="Mô tả chi tiết">
                    </div>
                    <div style="padding-bottom: 25px">
                            <span>Mô tả ngắn: </span><input type="text" name="motangan" placeholder="Mô tả ngắn">
                    </div>
                    <div style="padding-bottom: 25px">
                            <span>Chiều cao: </span><input type="text" name="chieucao" placeholder="Chiều cao">
                    </div>
                    <input class="input" type="submit" name="uploadclick" value="Upload">
                </form>
            </div>
    </div>
    </body>
</html>