<?php
    require_once('./_private/bundle.php');

    $sql_rec = 'SELECT count(id) as total FROM hoa';
    $retval_rec = $DB->query($sql_rec);
    $row_rec = mysqli_fetch_array($retval_rec, MYSQLI_ASSOC);
    $total_rec = $row_rec['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;
    $total_page = ceil($total_rec / $limit);
    if($current_page > $total_page){
        $current_page = $total_page;
    }
     else if($current_page < 0 ){
        $current_page = 1;
    }
    $start = ($current_page -1)*$limit;
    $sql = "SELECT * FROM hoa LIMIT $start, $limit";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="charset" content="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
        <title>ADMIN</title>
        <link rel="stylesheet" href="assets/css/mngflower.css?v=<?=rand(1,10000)?>">
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
            <div>
                <div class="box2">
                    Danh sách hoa
                </div>
                <div class="container1">
                    <input type="text" placeholder="Tìm kiếm">
                    <a href="themhoa.php"><button class="btn1"><img src="assets/images/Icon awesome-plus-circle.png"> Thêm</button></a>
                </div>
                <table id="customers">
                    <tr>
                        <th>ID</th>
                        <th>Tên hoa</th>
                        <th>Ảnh</th>
                        <th>Mô tả chi tiết</th>
                        <th>Mô tả ngắn</th>
                        <th>Chiều cao</th>
                        <th>Giá</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                    <?php 
                        $retval = $DB->query( $sql );
                        while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) : ?>
                        <td style="text-align: center"><?php echo $row['id']; ?></td>
                        <td><?php echo $row['tenhoa']; ?></td>
                        <td><img class="img" max-width=100% src="assets/images/<?php echo $row['anh']; ?>"></td>
                        <td style="width: 300px;"><?php echo $row['motadai']; ?></td>
                        <td><?php echo $row['motangan']; ?></td>
                        <td style="width:75px"><?php echo $row['chieucao']; ?></td>
                        <td><?php echo $row['gia']; ?>$</td>
                        <td style="width: 75px">
                            <a href="edithoa.php?id=<?php echo $row['id']; ?>"><img src="assets/images/Icon awesome-sticky-note.png"></a>
                            <a href="xoahoa.php?id=<?php echo $row['id']; ?>"><img src="assets/images/Icon material-delete-forever.png"></a>
                        </td>
                    </tr>
                    <?php endwhile; ?>  
                </table>
                <div style="text-decoration: none; font-size: 20px; padding-top: 25px; text-align: center">
                    <?php
                        if($current_page > 1 && $total_page > 1){
                            echo'<a href="mngflower.php?page='.($current_page-1).'"> << <a> | ';
                        }
                        for($i=1 ; $i<$total_page ; $i++){
                            if($i==$current_page){
                                echo'<span>'.$i.'</span> |';
                            }else{
                                echo'<a href="mngflower.php?page='.$i.'">'.$i.'</a> | ';
                            }
                        }
                        if($current_page < $total_page && $total_page > 1){
                            echo'<a href="mngflower.php?page='.($current_page+1).'"> >> </a> ';
                        }
                    ?>
                <div>
            </div>
        </div>
    </body>
</html>