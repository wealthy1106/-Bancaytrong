<?php
  include_once "./../connection.php";
  
//   if(isset($_POST['hoten'])){
//     header ('Location: dangnhap.php');
//   }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đăng Ký</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="shortcut icon" href="logo và phong nen/Logo.PNG" type="image/vnd.microsoft.icon" >
        <script src="https://kit.fontawesome.com/f933a9a1ec.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/index.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </head>
    
    <body>

      <main>
        <div style="text-align: center;"><h1>Đăng Ký Tài Khoản Admin</h1></div>
        <div style="margin: 0 auto; width: 500px; border: 2px solid yellowgreen; padding: 10px;">
            <form action="dangnhapadmin.php" method="post">
                <div class="form-group">
                    <label for="formGroupExampleInput">Họ Tên: </label>
                    <input type="text" class="form-control" name="hoten">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Địa Chỉ: </label>
                    <input type="text" class="form-control" name="diachi" >
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput3">Email: </label>
                    <input type="email" class="form-control" name="email" >
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput4">Số Điện Thoại</label>
                    <input type="text" class="form-control" name="sdt" >
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Mật Khẩu: </label>
                    <input type="password" class="form-control" name="matkhau" >
                </div>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </form>
        </div>
      </main>
        <br>
      
    </body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>