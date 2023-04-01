<?php
  include_once "./../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Đơn Hàng</title>
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
                        <li><button><a href="../admin/loaisp1.php">Loại Cụ Thể</a></button></li>
                        <li><button><a href="dstaikhoan.php">Tài Khoản</a></button></li>
                        <li><button style="background-color: aquamarine;"><a href="chitietdonhang.php">Danh Sách Đơn Hàng</a></button></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <div><img src="../logo và phong nen/nenadmin.PNG" style="width: 100%;" alt=""></div>
               <h1 style="text-align: center;">Danh Sách Đơn Hàng</h1>
               <hr>
               <?php
                  $query = "select *,sum(thanhtien) as tong from donhang";
                  $stt = 1;
                  try {
                      $sth = $pdo->query($query);
                      while ($row = $sth->fetch()){
                         echo '
                          <h5 class="col text-center">Tổng số tiền toàn bộ : '.$row['tong'].' Đồng</h5>  
                         ';
                      }   
                  } catch (PDOException $e){
                      
                  }
                  
                ?>
                <div class="row">
                <?php
                  $query = "select *,sum(thanhtien) as tong from donhang 
                            where trangthai='Đã xử lí';";
                  $stt = 1;
                  try {
                      $sth = $pdo->query($query);
                      while ($row = $sth->fetch()){
                         echo '
                         <h5 class="col">Tổng số tiền đơn đã xử lí: '.$row['tong'].' Đồng</h5>
                         ';
                      }   
                  } catch (PDOException $e){
                      
                  }
                ?>
                <?php
                  $query = "select *,sum(thanhtien) as tong from donhang where trangthai='Chưa xử lí';";
                  $stt = 1;
                  try {
                      $sth = $pdo->query($query);
                      while ($row = $sth->fetch()){
                         echo '
                          <h5 class="col">Tổng số tiền đơn chưa xử lí: '.$row['tong'].' Đồng</h5>
                         ';
                      }   
                  } catch (PDOException $e){
                      
                  }
                ?>
                </div>
                <hr>
                <div>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã Đơn Hàng</th>
                            <th scope="col">Ngày Tạo Đơn</th>
                            <th scope="col">Thông Tin Đơn Hàng</th>
                            <th colspan="col">Thành Tiền</th>
                            <th colspan="col">Trạng Thái</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "select * from donhang;
                            ";
                            $stt = 1;
                            try {
                                $sth = $pdo->query($query);
                                while ($row = $sth->fetch()){
                                   echo '
                                    <tr>
                                      <th scope="row">'.$stt++.'</th>
                                      <td>'.$row['idDH'].' </td>
                                      <td>'.$row['Ngay'].'</td>
                                      <td><a href="chitetdh.php?id='.$row['idDH'].'&&sotk='.$row['SoTK'].' ">Chi tiết</a></td>
                                      <td>'.$row['thanhtien'].'</td>
                                      <td>'.$row['trangthai'].'</td>
                                    </tr>
                                   ';
                                }   
                            } catch (PDOException $e){
                                
                            }
                          ?>
                          <!-- <tr>
                            <th scope="row">1</th>
                            <td>HH001</td>
                            <td>Nguyễn Thanh Mẫn</td>
                            <td><a href="ttchitetsp.html">Chi tiết</a></td>
                            <td>An Khánh Ninh Kiều Cần Thơ</td>
                            <td>Đã Thanh Toán</td>
                            </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                           
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                           
                          </tr> -->
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>