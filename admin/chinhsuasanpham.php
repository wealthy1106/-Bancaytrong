<?php
    include_once "./../connection.php";
    if(isset($_GET['masp'])) {
        $masp = $_GET['masp'];  
        $query = "select * from sanpham where MaSP = '".$_GET['masp']."'";
        $stt = 1;
        try {
            $sth = $pdo->query($query);
            if ($row = $sth->fetch()){
                $tensp = $row['tenSP'];
                $xuatxu = $row['XuatXu'];
                $giasp = $row['giaSp'];
                $ddsp = $row['dacdiemSP'];
                $tacdung = $row['tacdung'];
                $hinh = $row['hinh'];
                $idloai = $row['idloai'];
            }   
        } catch (PDOException $e){
            
        }
      } 
        
          
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Sản Phẩm</title>
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
                        <li><button><a href="dstaikhoan.php">Tài Khoản</a></button></li>
                        <li><button><a href="dsdonhang.php">Danh Sách Đơn Hàng</a></button></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <div><img src="../logo và phong nen/nenadmin.PNG" style="width: 100%;" alt=""></div>
               <h1 style="text-align: center;">Chỉnh Sửa Sản Phẩm</h1>
                <div style="width: 600px;margin: auto;">
                <form action="../admin.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="masp">Mã Sản Phẩm</label>
                        <input readonly type="text" class="form-control" id="maloai" name="masp" value="<?php echo $masp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tensp">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" id="tensp" name="tensp" value="<?php echo $tensp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="xuatxu">Xuất xứ</label>
                        <input type="text" class="form-control" id="xuatxu" name="xuatxu" value="<?php echo $xuatxu; ?>">
                    </div>
                    <div class="form-group">
                        <label for="giasp">Giá Sản Phẩm</label>
                        <input type="text" class="form-control" id="giasp" name="giasp" value="<?php echo $giasp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ddsp">Đặc Điểm Sản Phẩm</label>
                        <textarea class="form-control" id="ddsp" name="ddsp" rows="3"><?php echo $ddsp; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="congdung">Công dụng</label>
                        <input type="text" class="form-control" id="congdung" name="congdung" value="<?php echo $tacdung; ?>">
                    </div>
                    <div style="width: 600px;">
                        <input  type="file" name="fileanh" onchange=read(this) value="<?= $hinh ?>"><img style="width: 100%;" id="outImg" src="../<?= $hinh ?>" alt="">
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <label for="idloai">Id Loại</label>
                        <input type="text" class="form-control" id="idloai" name="idloai" value="<?php echo $idloai; ?>">
                    </div>
                    <input type="submit" name="upload" class="btn btn-primary"></input>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function read(val) {
        const reader = new FileReader();

        reader.onload = (event) => {
            document.getElementById("outImg").src = event.target.result;
        }
        reader.readAsDataURL(val.files[0]);
    }
    </script>
</body>
</html>