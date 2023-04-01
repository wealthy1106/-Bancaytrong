<?php 
  include_once "./../connection.php";

  if(isset($_POST['daxuli'])) {
    $query = "UPDATE `myweb`.`donhang` SET `trangthai` = 'Đã xử lí' WHERE (`idDH` = ?);";
		try{
      $sth = $pdo->prepare($query);
      $sth->execute([
        $_GET['id']
      ]);
    }catch (PDOException $e){
      $pdo_error = $e->getMessage();
    }
  }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
    <link rel="shortcut icon" href="../logo và phong nen/Logo.PNG" type="image/vnd.microsoft.icon" >
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </head>
 
    <body>
    <div>
        <div class="row">
            <div class="col-sm-3">
                <img src="../logo và phong nen/Logo.PNG" style="width: 100%;" alt="">
                <div>
                    <ul>
                        <li><button><a style="text-decoration: none;" href="../admin.php">Sản Phẩm</a></button></li>
                        <li><button><a href="loaisp.php">Loại Sản Phẩm</a></button></li>
                        <li><button><a href="../admin/loaisp1.php">Loại Cụ Thể</a></button></li>
                        <li><button><a href="dstaikhoan.php">Tài Khoản</a></button></li>
                        <li><button style="background-color: aquamarine;"><a href="dsdonhang.php">Danh Sách Đơn Hàng</a></button></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <div><img src="../logo và phong nen/nenadmin.PNG" style="width: 100%;" alt=""></div>
               <h1 style="text-align: center;">Chi Tiết Đơn Hàng</h1>
                <br>

                <?php 
                    $query = "select * from taikhoan natural join donhang 
                              where SoTK = '".$_GET['sotk']."' and iddh = '".$_GET['id']."';";
                    $stt = 1;
                    try {
                        $sth = $pdo->query($query);
                        if ($row = $sth->fetch()){
                            echo ' 
                            <div>
                                <h5>Họ tên: '.$row['HoTen'].'</h5>
                                <h5>Địa chỉ: '.$row['DiaChi'].'</h5>
                                <h5>Email: '.$row['email'].' </h5>
                                <h5>Số điện thoại: '.$row['SDT'].'</h5>
                                <div class="form-group">
                                    <form action="chitetdh.php?id='.$_GET['id'].'&&sotk='.$_GET['sotk'].'" method="POST">
                                        <h5>Trạng thái: 
                                        <select style="width: 100px;" id="exampleFormControlSelect1">
                                        <option>'.$row['trangthai'].'</option>
                                        <option value="Đã xử lí" >Đã xử lí</option>
                                        </select>   
                                        <button type="submit" name="daxuli" class="btn btn-primary">Xác nhận thay đổi</button>
                                    </form>    
                                </div>
                                    </h5>
                            </div>
                            ';
                        }   
                    } catch (PDOException $e){
                        
                    }
                ?>
                <!-- <div>
                    <p>Họ Tên:</p>
                    <p>Địa chỉ:</p>
                    <p>email:</p>
                    <p>Ngày tạo:</p>
                </div> -->
                
                  <div>
                    <table class="table text-center">
                      <thead>
                        <tr style="font-size: 20px;">
                          <th scope="col">STT</th>
                          <th scope="col">Hình Ảnh</th>
                          <th scope="col">Tên Sản Phẩm</th>
                          <th scope="col">Số Lượng</th>
                          <th scope="col">Giá</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                            $query = "select hinh,tenSP,soLuong,giaSp 
                                      from soluonggh natural join sanpham 
                                                     natural join donhang
                                      where SoTK ='".$_GET['sotk']."' and iddh = '".$_GET['id']."';";
                            $stt = 1;
                            try {
                                $sth = $pdo->query($query);
                                while ($row = $sth->fetch()){
                                    echo '
                                        <tr style="font-size: 20px;">
                                        <th scope="row">'.$stt++.'</th>
                                        <td class="col-4 m-auto"><img style="width: 70%;" src="../'.$row['hinh'].'" alt=""></td>
                                        <td>'.$row['tenSP'].'</td>
                                        <td>'.$row['soLuong'].'</td>
                                        <td>'.$row['giaSp'].'</td>
                                        </tr>
                                        
                                    ';
                                }   
                            } catch (PDOException $e){
                                
                            }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <?php
                    $query = "select sum(soLuong * giaSp) as tong
                                from soluongGH natural join sanpham
                                            natural join taikhoan
                            where SoTK = '".$_GET['sotk']."';"; 
                    try {
                        $sth = $pdo->query($query);
                        if ($row = $sth->fetch()){
                            echo  '
                                <h3>Tổng cộng: '.$row['tong'].' đồng</h3>
                            ';
                        }
                    } catch (PDOException $e){
                        
                    }
                    
                    ?>     
                  
              </div>
            </div>
        </div>
    </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>