<?php
 include_once "./../connection.php";

if(isset($_POST['idloai'])) {
  $idloai = $_POST['idloai'];
  $tenloai = $_POST['tenloai'];
  $maloai = $_POST['maloai'];
  $query = 'INSERT INTO loaicuthe (idloai, tenLoai, Maloai)
  VALUES (?,?,?)';
  try{
    $sth = $pdo->prepare($query);
    $sth->execute([
      $idloai,
      $tenloai,
      $maloai,
    ]);
  }catch (PDOException $e){
    $pdo_error = $e->getMessage();
  }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loại Cụ Thể</title>
    <link rel="shortcut icon" href="../logo và phong nen/Logo.PNG" type="image/vnd.microsoft.icon" >
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f933a9a1ec.js" crossorigin="anonymous"></script>

</head>
<body>
<div>
        <div class="row">
            <div class="col-sm-3">
                <img src="../logo và phong nen/Logo.PNG" style="width: 100%;" alt="">
                <div>
                    <ul>
                        <li><button><a href="../admin.php">Sản Phẩm</a></button></li>
                        <li><button><a href="loaisp.php">Loại Sản Phẩm</a></button></li>
                        <li><button style="background-color: aquamarine;"><a href="#">Loại Cụ Thể</a></button></li>
                        <li><button><a href="dstaikhoan.php">Tài Khoản</a></button></li>
                        <li><button><a href="dsdonhang.php">Danh Sách Đơn Hàng</a></button></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <div><img src="../logo và phong nen/nenadmin.PNG" style="width: 100%;" alt=""></div>
               <h1 style="text-align: center;">Các Loại Sản Phẩm</h1>
               <div>
                  <a href="themloaispcuthe.php" style="background-color: aqua; font-size: 30px;"><i class="fa-thin fa-plus"></i></a>
                </div>
               <br>
                <div>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Id Loai</th>
                            <th scope="col">Tên loại</th>
                            <th scope="col">Mã Loại</th>
                            <th scope="col">Chỉnh Sửa</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $query = 'select * from loaicuthe';
                            $stt = 1;
                            try {
                                $sth = $pdo->query($query);
                                while ($row = $sth->fetch()){
                                   echo '
                                   <tr>
                                   <th scope="row">'.$stt++.'</th>
                                   <td> '.$row['idloai'].' </td>
                                   <td> '.$row['tenLoai'].' </td>
                                   <td>'.$row['Maloai'].' </td>
                                   <td><a href="sualoaispcuthe.php?idloai=' . $row['idloai'] . '"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a></td>
                                 </tr>
                                   ';
                                }   
                            } catch (PDOException $e){
                                
                            }
                          ?>
                         
                          
                        </tbody>
                      </table>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>