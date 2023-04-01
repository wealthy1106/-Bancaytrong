<?php
  include_once "./../connection.php";
  if(isset($_POST['SoTK'])) {
    $sotk = $_POST['SoTK'];
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $mk = $_POST['matkhau'];
    $vaitro = 'admin';
    $query = 'INSERT INTO taikhoan (SoTK, HoTen, email, DiaChi, SDT, MatKhau, VaiTro)
    VALUES (?,?,?,?,?,?,?)';
    try{
      $sth = $pdo->prepare($query);
      $sth->execute([
        $sotk,
        $hoten,
        $email,
        $diachi,
        $sdt,
        $mk,
        $vaitro
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
    <title>Tài Khoản</title>
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
                        <li><button><a href="loaisp1.php">Loại Cụ Thể</a></button></li>
                        <li><button style="background-color: aquamarine;"><a href="#">Tài Khoản</a></button></li>
                        <li><button><a href="dsdonhang.php">Danh Sách Đơn Hàng</a></button></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <div><img src="../logo và phong nen/nenadmin.PNG" style="width: 100%;" alt=""></div>
               <h1 style="text-align: center;">Thông Tin Tài Khoản</h1>
               <div>
                <a href="themtkadmin.php" style="background-color: aqua; font-size: 30px;"><i class="fa-thin fa-plus"></i></a>
              </div>
                <div>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Số Tài Khoản</th>
                            <th scope="col">Họ Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Số Điện Thoại</th>
                            <th scope="col">Xóa</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          if(isset($_GET['idtk'])){
                            $query = "DELETE FROM `myweb`.`taikhoan` WHERE (`SoTK` = ?);";
                            try{
                                $sth = $pdo->prepare($query);
                                $sth->execute([
                                  $_GET['idtk'],
                                ]);
                              }catch (PDOException $e){
                                $pdo_error = $e->getMessage();
                              }
                            }
                            $query = 'select * from taikhoan';

                            try {
                                $sth = $pdo->query($query);
                                while ($row = $sth->fetch()){
                                    echo ' <tr>
                                    <th scope="row">'.$row['SoTK'].'</th>
                                    <td>' . $row['HoTen'] . '<noscript></noscript></td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['DiaChi'] . '</td>
                                    <td>' . $row['SDT'] . '</td>
                                    <td><a href="?idtk='.$row['SoTK'].'"><i class="fa-sharp fa-solid fa-trash"></i></a></td>
                                  </tr>';
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