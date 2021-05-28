<?php
require_once('./_private/bundle.php');
require_once(HEADER);

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="charset" content="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="assets/css/cart.css?v=<?=rand(1,10000)?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <?php
        $ok = 1;
        if($_SESSION['cart']){
            foreach($_SESSION['cart'] as $k=>$v){
                if(isset($v)){
                    $ok = 2;
                }
            }
        }
        if($ok != 2){
            echo '<p>Bạn không có sản phẩm nào/</p>';
        }
        else{
            $id = $_SESSION['cart'];
            echo '<span style="text-align: center; font-size: 35px">Bạn đang có '.count($id).' sản phẩm.</span>';
        }
    ?>
    <div>
        <table width: 100%>
        <?php
        $sql = "SELECT * FROM hoa WHERE id='$id'";
        $retval = $DB->query($sql);
        $row = mysqli_fetch_array($retval) ; 
        ?>
        <tr>
            <td><img src="assets/images/<?php echo $row['anh'];  ?>"></td>
            <td>
                <span><?php echo $row=['tenhoa']?></span>
                <br>
                <span><?php echo $row=['motangan']?></span>
            </td>
            <td><span><?php echo $row['gia']; ?> $</span></td>
        </tr>
        </table>
    </div>
    <a style="padding: 50px;" href="category.php">
        <img src="assets/images/Icon awesome-long-arrow-alt-left.png"><span>Tiếp tục mua hàng</span>
    </a>
</body>

</html>
<?php
    require_once(FOOTER);
?>