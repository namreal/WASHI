 <?php
    require_once('./_private/bundle.php');

if(isset($_POST['submit'])){
    $uname=isset($_POST['uname']) ? $_POST['uname'] : '';
    $pass=isset($_POST['pass']) ? $_POST['pass'] : '';
    $exec = $DB->get('select id from user where uname = "'.$uname.'" and pass = "'.$pass.'"');
    if($exec){
        echo 'run here';
        setcookie('name', $uname, time()*86400*365);
        setcookie('pass', $pass, time()*86400*365);
        header('Location: mngflower.php');
        exit;
    }
    else
        echo 'Lỗi';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/adlogin.css?v=<?=rand(1,10000)?>">
</head>
<body>
<center>
    <form action="mngflower.php" method="post">
        <div class="imgcontainer">
            <img src="assets/images/avt1.png">
            <br>
            <h1>FLOWERSTORE_ADMIN</h1>
        </div>

        <div class="container">
            <label for="uname"><b>Tài khoản</b></label>
            <input type="text" placeholder="Tên tài khoản" name="uname" required>
            <label for="psw"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Mật khẩu" name="pass" required>
        
            <button type="submit">Đăng nhập</button>
        </div>
    </form>
</center>
</body>
</html>